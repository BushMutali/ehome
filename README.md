
![MyImage](https://bushmutali.github.io/ehome/assets/img/icons/logo.png)
## E-Home Kenya

Digital platform that enable one to search for homes and also property managers can register their properties.  

# Custom bootstrap installation

Install globally:
```bash
npm install -g sass
npm install postcss-cli-autoprefixer
```

Navigate to your css folder. Create two files, `bootstrap.scss` and `bootstrap.css`

In the css folder, open the terminal and run:

```bash
npm init
# give it a name that is not 'bootstrap'
# the rest of the prompt don't really matter you can just press enter
```
```bash
npm install --save bootstrap
```
Now in your `bootstrap.scss` files you can change the value of the variables based on your liking. For example:

```scss
$primary: #004D40;
$secondary: #FF6F61;
$light: #F5F5f5;


@import "node_modules/bootstrap/scss/bootstrap";
```

- NB: The last line is important. You need to have it.  
- After that you can now run the following in your terminal.

```bash
sass bootstrap.scss bootstrap.css
```

> You have now successfully installed custom bootstrap theme.
<span style="color: white">Anytime you make changes to the `bootstrap.scss` file make sure you run `sass bootstrap.scss bootstrap.css` in the terminal, in your css folder to save your new changes.</span>
