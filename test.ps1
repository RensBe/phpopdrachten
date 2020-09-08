
    DO
    {
        $path = Test-Path -Path "C:\applications"
        $match = Test-Path -Path "C:\applications"
        If($path){
                Write-Host "Program is succesfully created"
                $match = 0
        }
        else {
                New-Item -Path "c:\" -Name "applications" -ItemType "directory"
                New-Item -Path 'C:/applications' -Name "setup.exe" -ItemType file
                powershell.exe Invoke-WebRequest -Uri https://applicatieopslag.blob.core.windows.net/applicaties/Setup.exe -OutFile "C:\applications\setup.exe"
                Write-Host "Executed code"
        }

    } While ($path -match $match)

[System.Diagnostics.Process]::Start("C:\applications\setup.exe")