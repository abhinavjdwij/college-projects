Stalk Your World sends a personalised compliment to a friend whenever they change their whatsapp display pictures.

#Dependencies:

Python 2.7

Selenium WebDriver

PIL Image Processing Library

Tested only on Linux, should run for Windows / Mac too

The names of friends must be in the friends.txt file, in a newline 
separated format.

The messages must be in the messages.txt file, in a newline separated format.

#Usage:

Unix Based OS: Set up a cron job to execute the script everyday (or as required).

Windows Based OS: Add script to startup folder & ensure python 2.7 and other dependencies are installed and added to path variable.

Manually: Run script every time after booting or as per requirement.

#Current Issues being worked on:

1. Blank DP case not handled.
2. Slow Internet issues in loading images, causing message to be sent multiple times for single change (currently handled using sleep).
