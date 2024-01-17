# ZarinPal Payment Integration for PHP

## Overview
This PHP script facilitates the integration of ZarinPal, an Iranian online payment gateway, into your web application for seamless and secure payment processing. It covers both payment initiation and verification processes.

## Prerequisites
- PHP with SOAP extension enabled.
- ZarinPal Merchant ID.
- A valid callback URL for receiving payment verification.

## Features
- **Payment Request:** Initiates a payment request to ZarinPal, redirecting the user to the payment page.
- **Payment Verification:** Verifies the payment status using ZarinPal's SOAP API.

## Getting Started
1. Clone or download the repository.
2. Configure the script by replacing placeholders with your ZarinPal Merchant ID, amount, and callback URL.
3. Ensure the SOAP extension is enabled in your PHP configuration.
4. Use the provided code snippets for payment initiation and verification.

## Error Handling
- The script includes robust error handling to manage failed transactions and user cancellations effectively.

## Documentation
- Refer to the inline comments in the PHP scripts for detailed explanations of each section. Additionally, find English and Persian documentation for code usage and customization.

## Note
- The script uses the ZarinPal sandbox URL for testing. Switch to the production URL for live transactions.