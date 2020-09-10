
    DO
    {
        $i = 1
        $path = Test-Path -Path "C:\applications"
        If($path){
                Write-Host "Program is succesfully created"
                [System.Diagnostics.Process]::Start("C:\applications\Setup.exe")
                $i = 0
        }
        else {
                New-Item -Path "c:\" -Name "applications" -ItemType "directory"
                New-Item -Path 'C:/applications' -Name "Setup.exe" -ItemType file
                powershell.exe Invoke-WebRequest -Uri https://applicatieopslag.blob.core.windows.net/applicaties/Setup.exe -OutFile "C:\applications\Setup.exe"
                Write-Host "Executed code"
        }
    } While ($i == 1)
