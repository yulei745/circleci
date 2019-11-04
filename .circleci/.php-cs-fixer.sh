#!/bin/bash
git config user.name "yulei745"
git config user.email "yleimm@gmail.com"

git add index.php src/* -f
git commit -m "php-cs-fixer [circleci]"

git push $CIRCLE_REPOSITORY_URL
