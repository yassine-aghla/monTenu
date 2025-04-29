<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\PasswordService;
use App\Models\Role;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService,PasswordService $passwordService)
    {
        $this->authService = $authService;
        $this->passwordService = $passwordService;

    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation'=>'required|string|min:8|confirmed'
        ]);

        $user = $this->authService->register($request->all());
        // $user->roles()->attach(Role::where('name', 'client')->first());

        auth()->login($user);

        return redirect('/login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = $this->authService->login($request->only('email', 'password'));

        if (!$user) {
            return back()->withErrors([
                'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
            ]);
        }

        if ($user->is_banned) {
            auth()->logout();
            return back()->withErrors([
                'email' => 'Votre compte a été désactivé. Contactez l\'administrateur.',
            ]);
        }

        auth()->login($user);

        return redirect($this->redirectTo());
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $success = $this->passwordService->sendResetLink($request->only('email'));

        if ($success) {
            return back()->with('status', 'Un lien de réinitialisation a été envoyé à votre adresse e-mail.');
        }

        return back()->withErrors(['email' => 'Impossible d\'envoyer le lien de réinitialisation.']);
    }

    public function showResetPasswordForm(Request $request, $token)
    {
        return view('auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $success = $this->passwordService->resetPassword($request->only('email', 'password', 'token'));

        if ($success) {
            return redirect()->route('login')->with('status', 'Votre mot de passe a été réinitialisé avec succès.');
        }

        return back()->withErrors(['email' => 'Impossible de réinitialiser le mot de passe.']);
    }

    protected function redirectTo()
{
    if (auth()->user()->hasRole('Admin')) {
        return '/dashboard';
    }
    return '/';
}
}