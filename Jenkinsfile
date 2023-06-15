pipeline {
    agent any
    stages {
        stage('SonarQube analysis') {
  
                def scannerHome = tool 'SonarQubePruebas';
                withSonarQubeEnv('SonarQubePruebas') {
                    bat "${scannerHome}/bin/sonar-scanner"
                }
            
        }
    }
}
