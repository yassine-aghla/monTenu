<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Non Trouvée | {{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f7f9;
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .error-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            display: flex;
            flex-direction: column;
            text-align: center;
        }
        
        .error-header {
            padding: 30px;
            background-color: #1e88e5;
            color: #fff;
        }
        
        .error-header h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .error-content {
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
        }
        
        .illustration {
            width: 100%;
            max-width: 400px;
        }
        
        .error-message {
            max-width: 600px;
        }
        
        .error-message h2 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: #1e88e5;
        }
        
        .error-message p {
            font-size: 1.1rem;
            margin-bottom: 20px;
        }
        
        .error-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }
        
        .btn {
            padding: 12px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary {
            background-color: #1e88e5;
            color: #fff;
        }
        
        .btn-primary:hover {
            background-color: #1565c0;
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background-color: #f5f5f5;
            color: #333;
        }
        
        .btn-secondary:hover {
            background-color: #e0e0e0;
            transform: translateY(-2px);
        }
        
       
      
        
        @media (max-width: 768px) {
            .error-content {
                padding: 30px 20px;
            }
            
            .error-header h1 {
                font-size: 2.5rem;
            }
            
            .error-message h2 {
                font-size: 1.5rem;
            }
            
            .football-field {
                width: 220px;
                height: 160px;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-header">
            <h1>404</h1>
            <p>Tir hors-cadre! Page non trouvée</p>
        </div>
        <div class="error-content">
            
            <div class="error-message">
                <h2>Oups! Le ballon est sorti du terrain</h2>
                <p>La page que vous recherchez a disparu dans les gradins. Elle n'existe pas ou a été déplacée.</p>
                
            </div>
            <div class="error-actions">
                <a href="{{ url('/') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg>
                    Retour à l'accueil
                </a>
                <a href="javascript:history.back()" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                    Page précédente
                </a>
            </div>
        </div>
    </div>
</body>
</html>