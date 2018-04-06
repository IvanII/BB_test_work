# Coupon pool task

## Docker deploy ( optional ):

1. Install docker, docker-compose
2. Run `docker-compose up -d`
3. Attach to the `workspace` container by typing in your console 
`docker-compose exec --user laradock workspace` and you are good to go. 

## Task
Make laravel work ( set .env , install composer and npm dependencies, migrate and seed should be enough  )

Implement `/coupons` page functionality, add required models, relations tables etc.

Users can obtain coupons

Business logic rule - Coupons pool never can give more than 1 coupon per 10 sec

Cover the code with tests

Refactor where you think it is required ( assuming you are working on large app )

Make sure you add comments like you do it when do coding in big team.

Don't hesitate to contact if any questions.

