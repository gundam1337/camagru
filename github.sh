#!/bin/bash

# Get the commit message from the user
echo "Enter a commit message:"
read commit_message

# Add all changes and commit with the given message
git add .
git commit -m "$commit_message"

# Push changes to the remote repository
git push 
