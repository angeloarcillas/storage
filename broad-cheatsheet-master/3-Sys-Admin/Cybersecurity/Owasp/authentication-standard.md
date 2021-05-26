# Authentication Security Standard

## Password Security Requirements

- Atleast 12 characters in length
- 64 characters or longer is not permitted
- No whitespace
- Restrict from using common passwords
- Add a password strength meter
- No password composition (upper, lowercase, numbers, special characters)
- Verify that "paste" functionality, browser password helpers, and external password managers are permitted.
- Add temporarily view the entire masked password

- User can change their password
- Password change requires the user's current and new password
- No repeated old password


## General Authenticator Requirements
- Verify that no more than 100 failed attempts per hour is possible on a single account.
- Weak authenticators (such as SMS and email) is limited to secondary verification only
- Notify the user after updates to authentication details such as password changes
- Add resistance again phishing
- Verify credential service provider(CSP) and Transport Layer Security(TLS)
- Verify replay resistance through OTP device

## Authenticator Lifecycle Requirements
- Securely randomly generated
- Atleast 6 characters
- Expire after a short period of time
- Not permitted to become a long term password 
- Verify support of U2F or FIDO
- Verify renewal instructoins sent with sufficient time to renew time bound authenticators

## Credential Storage Requirements
- Hash password
- Salt needs to be atleast 32bit in length
- Hash it to its maximum capability

## Credential Recovery Requirements
- Verify if it is being sent to the user, it is single-use, time-limited and random
- No password hints
- Do not reveal the current password in anyway
- Notify the user if any authenticatoin factor is change or replaced
- Use secure recovery mechanism
- Verify that if OTP or multi-factor authentication factors are lost, that evidence of identity proofing is performed at the same level as during enrollment.

## Look-up Secret Verifier Requirements
- Used only once
- Have sufficient randomness112 bits of entropy or salted with a unique and random 32-bit salt and hashed with an approved one-way hash.
- Verify if resistant to offline attacks

## Out of Band Verifier Requirements
- Verify that stronger alternatives are offered first
- Request should expire after 10mins
- Usable only once and unique
- Verify that it communicates over a secure independent channel
- Verifyer retains only hashed version
- atleast six digit random character is sufficient

## Single or Multi-factor One Time Verifier Requirements
- Verify time-based OTPs have a defined lifetime before expiring.
