DO
    {
        $path = Test-Path -Path "C:\applications"
        $match = Test-Path -Path "C:\applications"
        If($path){
                Write-Host "Program is succesfully created"
                [System.Diagnostics.Process]::Start("C:\applications\Setup.exe")
                $match = 0
        }
        else {
                New-Item -Path "c:\" -Name "applications" -ItemType "directory"
                New-Item -Path 'C:/applications' -Name "Setup.exe" -ItemType file
                powershell.exe Invoke-WebRequest -Uri https://applicatieopslag.blob.core.windows.net/applicaties/Setup.exe -OutFile "C:\applications\Setup.exe"
                Write-Host "Executed code"
        }
    } While ($path -match $match)
