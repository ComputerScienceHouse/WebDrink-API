# WebDrink API

Created to replace the existing API inside of WebDrink-2.0

### What's Changed?
- Replaces Webauth with SSO/OIDC
- Separated from WebDrink client
- Using proper url routing
- Updated Schema and communication

#### Built Using
- Boring ol' [PHP](http://php.net/)
- [Composer](https://getcomposer.org/)
- [Slim](https://www.slimframework.com/)
- [Doctrine](http://www.doctrine-project.org/)


<table style="width:100%">
  <tr>
    <th>v2</th>
    <th>v3</th>
  </tr>
  <tr>
    <td align="center"><a href="https://github.com/devinmatte/WebDrink-API/blob/master/docs/API-V2.md"><img src="https://img.shields.io/badge/Documentation-v2-blue.svg"></a></td>
    <td align="center"><a href="https://github.com/devinmatte/WebDrink-API/blob/master/docs/API-V3.md"><img src="https://img.shields.io/badge/Documentation-v3-brightgreen.svg"></a></td>
  </tr>
    <tr>
      <td>Maintains close compatibility for older systems</td>
      <td>Created for newer, more modern clients</td>
    </tr>
</table>


## Development

- Copy `config.temp.php` to `config.php` and fill in the defaults
- Run on `localhost:6969` in order to test using SSO/OIDC
    - Contact an RTP for a secret