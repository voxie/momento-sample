# Momento Sample

## Deploy Locally to AWS

You will need PHP 8.2, Composer 2.5, and a recent version of Serverless Framework 3.

### Step 1: Install dependencies using Composer

```
composer install
```

If you don't have the gRPC extension installed locally, no bother - it is not needed to perform the deployment, and this can be worked around by instead using the command:

```
composer install --ignore-platform-req=ext-grpc
```

### Step 2: Deploy using Serverless

```sh
AWS_ACCESS_KEY_ID=your-aws-access-key-id-here \
AWS_SECRET_ACCESS_KEY=your-aws-secret-access-key-here \
AWS_SESSION_TOKEN=your-aws-session-token-here \
AWS_REGION=your-aws-region-here \
BREF_GRPC_LAYER_ARN=your-grpc-arn-here \
MOMENTO_AUTH_TOKEN=your-momento-auth-token-here \
MOMENTO_CACHE_NAME=your-momento-cache-name-here \
MOMENTO_CACHE_KEY=your-momento-cache-key-here \
serverless deploy
```

A partially prefilled example is:

```sh
AWS_ACCESS_KEY_ID=your-aws-access-key-id-here \
AWS_SECRET_ACCESS_KEY=your-aws-secret-access-key-here \
AWS_SESSION_TOKEN=your-aws-session-token-here \
AWS_REGION="us-east-1" \
BREF_GRPC_LAYER_ARN="arn:aws:lambda:us-east-1:266934024307:layer:bref-php-82al2-grpc-arm:6" \
MOMENTO_AUTH_TOKEN=your-momento-auth-token-here \
MOMENTO_CACHE_NAME=your-momento-cache-name-here \
MOMENTO_CACHE_KEY="foo" \
serverless deploy
```
