pipeline {
    agent any

    environment {
        // Imposta le variabili d'ambiente per il test
        APP_ENV = 'testing'
        APP_DEBUG = 'true'
        DB_CONNECTION = 'sqlite'
        DB_DATABASE = ':memory:'  // Usa un database SQLite in memoria per i test
        MAIL_MAILER = 'smtp'
        MAIL_HOST = 'smtp.mailtrap.io'
        MAIL_PORT = '2525'
        MAIL_USERNAME = 'your_mailtrap_username'
        MAIL_PASSWORD = 'your_mailtrap_password'
        MAIL_ENCRYPTION = 'tls'
        MAIL_FROM_ADDRESS = 'hello@example.com'
        MAIL_FROM_NAME = 'Laravel'
    }

    stages {
        stage('Checkout') {
            steps {
                // Controlla il codice sorgente dal repository
                git branch: 'main', url: ' https://github.com/dariolad/laravelmail.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                // Installa le dipendenze PHP e Node.js (se necessario)
                script {
                    sh 'composer install'
                    sh 'npm install'  // Se usi npm per frontend, altrimenti puoi rimuovere questa linea
                }
            }
        }

        stage('Run Tests') {
            steps {
                // Esegui i test di Laravel
                script {
                    sh 'php artisan migrate --env=testing'  // Esegui le migrazioni per l'ambiente di test
                    sh 'php artisan test'  // Esegui i test
                }
            }
        }

        stage('Post') {
            always {
                // Archivia i risultati dei test e altri artefatti, se necessario
                junit '**/storage/logs/laravel.log'  // Cambia il percorso in base ai tuoi log
            }
        }
    }

    post {
        success {
            echo 'Tests passed successfully!'
        }
        failure {
            echo 'Tests failed.'
        }
    }
}
