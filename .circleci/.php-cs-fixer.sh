#!/bin/bash
git config user.name "discuz-bot"
git config user.email "171550539@qq.com"

git add index.php src/* -f
git commit -m "php-cs-fixer output for commit $CIRCLE_SHA1 [circleci]"

git push $CIRCLE_REPOSITORY_URL
