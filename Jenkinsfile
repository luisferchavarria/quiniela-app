pipeline {
    agent any
    stages {
        stage('SonarQube analysis') {
            steps {
                def scannerHome = tool 'SonarQubePruebas';
                withSonarQubeEnv('SonarQubePruebas') {
                    bat "${scannerHome}/bin/sonar-scanner"
                }
            }
        }
    }
}
