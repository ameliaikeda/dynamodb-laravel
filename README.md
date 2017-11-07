# DynamoDB Laravel Client

## Installation

```
composer require amelia/dynamodb
```

If using Laravel 5.5 or higher, all you need to do is set the following environment variables:

```
DYNAMODB_KEY=<aws access key>
DYNAMODB_SECRET=<aws secret key>
DYNAMODB_REGION=us-west-2
DYNAMODB_HASH_KEY=id
SESSION_TABLE=sessions
```

## Local installations

If you're using a local AWS service like [localstack](https://github.com/localstack/localstack) you can set your AWS endpoint using:

```
DYNAMODB_ENDPOINT=http://localhost:9001 # etc
```

## Licence

BSD-3-Clause. See the [LICENCE](/LICENCE) file for the full licence text.
