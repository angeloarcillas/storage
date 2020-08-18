# Cybersecurity

## 📜 Table of Contents
- [ Top 10 Web Application Risks ]( #top-10-web-application-risks)
- [ Preventions ]( #preventions)
- [ Top 10 Web Application Risks ]( #top-10-web-application-risks)
- [ Top 10 Web Application Risks ]( #top-10-web-application-risks)
- [ Top 10 Web Application Risks ]( #top-10-web-application-risks)
- [ Top 10 Web Application Risks ]( #top-10-web-application-risks)
- [ Top 10 Web Application Risks ]( #top-10-web-application-risks)

<hr>

## Top 10 Web Application Risks
1. **Injection**
  - Injection flaws, such as SQL, NoSQL, OS and LDAP injection occur when untrusted data is sent to an interpreter as part of a command or query.
2. **Broken Authentication**
  - Application functions related to authentication and session management are often implemented incorrectly.
3. **Sensitive Data Exposure**
  - Improper protection against sensitive data, such as Personal Identifiable Information, Financial and Healthcare.
4. **XML External Entities**
  - External entities can be used to disclose internal files using the file URI handler, internal file shares, internal port scanning, remote code execution, and denial of service attacks
5. **Broken Access Control**
  - Restrictions on what authenticated users are allowed to do are often not properly enforced.
6. **Security Misconfiguration**
  - Insecure default configurations, incomplete configurations, open cloud storage, misconfigured HTTP headers, and verbose error messages containing sensitive information.
7. **Coss-site Scripting**
  - XSS flaws occur whenever an application includes untrusted data in a new web page without proper validation or escaping, or updates an existing web page with user-supplied data using a browser API that can create HTML or JavaScript.
8. **Insecure Deserialization**
  - Used to perform attacks, including replay attacks, injection attacks, and privilege escalation attacks.
9. **Using Components with Known Vulnerabilities**
  - Components, such as libraries, frameworks, and other software modules. Using components with known vulnerabilities may weaken application defenses and enable various attacks and impacts.
10. **Insufficient Logging & Monitoring**
  - missing or ineffective integration with incident response.

# Preventions

<details>
<summary>Anti-Clickjacking</summary>

**PHP**
```php
header("X-Frame-Options: DENY");
header("Content-Security-Policy: frame-ancestors 'none'", false);
```

**JS**
```html
<style>
  /* Hide page by default */
  html { display : none; }
</style>

<script>
  if (self == top) {
    document.documentElement.style.display = 'block';
  } else {
    // Break out of the frame.
    top.location = self.location;
  }
</script>
```
</details>
<!-- <details>
<summary>Attacks / Vulnerabilities</summary>

```cs
[ SQL injection ]
[ OBJECT injection/DESERIALIZATION ]
[ LDAP injection ]
[ XSS ] - cross site scripting
[ CSRF ] - Cross Site Request Forgery
[ Broken Authentication and Session Management ]
[ Insecure Direct Object References ]
[ Security misconfiguration ]
[ Missing function level access control ]
[ Unvalidated redirects and forwards ]
[ Insecure Cryptographic Storage ]
[ Failure to restrict URL Access ]
[ Insufficient Transport Layer Protection ]
```
</details>

<details>
<summary>Cryptography</summary>

</details>
<details>
<summary>Tools</summary>

</details>

<details>
<summary>Web security</summary>

**PHP**
```php
header("X-Frame-Options: DENY");
header("Content-Security-Policy: frame-ancestors 'none'", false);
```
**JS**
```html
<style>
  /* Hide page by default */
  html { display : none; }
</style>

<script>
  if (self == top) {
    // Everything checks out, show the page.
    document.documentElement.style.display = 'block';
  } else {
    // Break out of the frame.
    top.location = self.location;
  }
</script>
```
**Preventions of OWASP Top 10**
1. injection
    - use prepared statement
    - sanitize inputs
    - use tokens
2. broken authentication
    - conduct testing
3. sensitive data exposure
    - hash/encrypt critical datas
4. xml external entities - XXE
    - disable inline parsing of DTDs
    - limit web service privileges 
5. broken access control
    - limit user previlages
6. security misconfiguration
    - remove comments
    - remove debugging
    - setup code for production
    - setup cpanel for security
7. cross-site scripting - XXS
    - sanitize inputs
8. insecure de-serialization
9. using components with known vulnerabilities
    - use updated components
    - remove known vulnerabilities
10. insufficient logging & monitoring
    - monitor website
</details> -->