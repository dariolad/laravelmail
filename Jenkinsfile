pipeline {
    agent any

    environment {
        // Imposta le variabili d'ambiente per il test della posta elettronica
        APP_ENV = 'testing'
        APP_DEBUG = 'true'
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
                git branch: 'main', url: 'https://github.com/dariolad/laravelmail.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                // Installa le dipendenze PHP e Node.js (se necessario)
                script {
                    sh 'composer install'
                    
                }
            }
        }

        stage('Run Tests') {
            steps {
                // Esegui i test e genera il report JUnit
                script {
                    sh 'php vendor/bin/phpunit --log-junit=storage/test-reports/junit.xml'
                }
            }
        }
    }

    post {
        always {
            // Archivia i risultati dei test e altri artefatti, se necessario
            junit '**/storage/test-reports/*.xml'  // Cambia il percorso in base ai tuoi report JUnit
        }

        success {
            echo 'Tests passed successfully!'
        }
        failure {
            echo 'Tests failed.'
        }
    }
}
