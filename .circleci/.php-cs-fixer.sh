#!/bin/bash
git config user.name "yulei745"
git config user.email "yleimm@gmail.com"

git add * -f
git commit -m "php-cs-fixer [circleci]"

git push $CIRCLE_BRANCH
