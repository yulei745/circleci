#!/bin/bash
git config user.name "yulei745"
git config user.email "yleimm@gmail.com"

git add index.php src/* -f
git commit -m "php-cs-fixer [circleci]"

echo $CIRCLE_BRANCH

git push $CIRCLE_BRANCH
