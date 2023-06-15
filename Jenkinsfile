pipeline {
    agent any
    stages {
        stage('SonarQube analysis') {
            steps {
                withSonarQubeEnv('SonarQubePruebas') {
                    bat "${scannerHome}/bin/sonar-scanner"
                }
            }
        }
    }
}
