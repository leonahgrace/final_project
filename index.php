 <!DOCTYPE html>
    <html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Luchie's</title>

        <link rel="shortcut icon" href="luchieicon.svg" type="image/svg+xml">
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Open+Sans:wght@400;500;700&family=Poppins:wght@400;600&display=swap"
            rel="stylesheet">
    </head>
    <style>
:root {
    /**
     * colors
     */

    --cadet-blue-crayola: hsl(240, 10%, 70%);
    --gold-web-golden: hsl(50, 100%, 54%);
    --vivid-sky-blue: hsl(196, 84%, 63%);
    --midnight-blue: hsl(231, 83%, 25%);
    --minion-yellow: hsl(50, 100%, 64%);
    --independence: hsl(225, 24%, 27%);
    --orange-soda: hsl(7, 96%, 61%);
    --space-cadet: hsl(243, 23%, 18%);
    --fiery-rose: hsl(353, 83%, 65%);
    --klein-blue: hsl(230, 80%, 39%);
    --bluetiful: hsl(222, 88%, 55%);
    --glaucous: hsl(230, 52%, 63%);
    --manatee: hsl(254, 7%, 65%);
    --rufous: hsl(2, 85%, 35%);
    --black: hsl(0, 0%, 0%);
    --white: hsl(0, 0%, 100%);

    /**
     * typography
     */

    --ff-open-sans: "Open Sans", sans-serif;
    --ff-barlow: "Barlow", sans-serif;
    --ff-poppins: "Poppins", sans-serif;

    --fs-1: 3.5rem;
    --fs-2: 3rem;
    --fs-3: 2.4rem;
    --fs-4: 2rem;
    --fs-5: 1.8rem;
    --fs-6: 1.3rem;

    --fw-600: 600;
    --fw-700: 700;

    /**
     * border radius
     */

    --radius-5: 5px;
    --radius-10: 10px;
    --radius-15: 15px;
    --radius-20: 20px;

    /**
     * spacing
     */

    --section-padding: 60px;

    /**
     * shadow
     */

    --shadow: 0 -5px 10px var(--manatee);

    /**
     * transition
     */

    --transition-1: 0.05s ease;
    --transition-2: 0.25s ease;
    --cubic-out: cubic-bezier(0.33, 0.85, 0.56, 1.02);
}

/*-----------------------------------*\
    #RESET
  \*-----------------------------------*/

*,
*::before,
*::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

li {
    list-style: none;
}

a {
    text-decoration: none;
    color: inherit;
}

a,
img,
span,
input,
strong,
button,
textarea,
ion-icon {
    display: block;
}

img {
    height: auto;
}

ion-icon {
    pointer-events: none;
    color: var(--white);
}

button,
input,
textarea {
    background: none;
    border: none;
    font: inherit;
}

button {
    cursor: pointer;
}

input,
textarea {
    width: 100%;
}

address {
    font-style: normal;
}

html {
    font-size: 10px;
    font-family: var(--ff-open-sans);
    scroll-behavior: smooth;
}

body {
    background-color: var(--space-cadet);
    color: var(--cadet-blue-crayola);
    font-size: 1.6rem;
    line-height: 1.6;
    overflow-x: hidden;
}

:focus-visible {
    outline-offset: 4px;
}

::-webkit-scrollbar {
    width: 15px;
}

::-webkit-scrollbar-track {
    background-color: hsl(0, 0%, 95%);
}

::-webkit-scrollbar-thumb {
    background-color: hsl(0, 0%, 80%);
}

::-webkit-scrollbar-thumb:hover {
    background-color: hsl(0, 0%, 70%);
}

/*-----------------------------------*\
    #REUSED STYLE
  \*-----------------------------------*/

.container {
    padding-inline: 20px;
}

.btn {
    color: var(--white);
    font-family: var(--ff-barlow);
    font-size: var(--fs-5);
    font-weight: var(--fw-600);
    max-width: max-content;
    padding: var(--padding, 10px 40px);
    border-radius: 50px;
    transition: var(--transition-2);
}

.btn-primary.blue {
    background-color: var(--klein-blue);
}

.btn-primary.blue:is(:hover, :focus) {
    background-color: var(--orange-soda);
}

.img-cover {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.section {
    padding-block: var(--section-padding);
}

.section-subtitle {
    color: var(--orange-soda);
    font-family: var(--ff-barlow);
    font-size: var(--fs-4);
    text-align: center;
}

.h2,
.h3 {
    color: var(--white);
    font-family: var(--ff-barlow);
    font-weight: var(--fw-600);
    line-height: 1.3;
}

.h2 {
    font-size: var(--fs-2);
}

.h3 {
    font-size: var(--fs-3);
}

.section-title,
.section-text {
    text-align: center;
}

/*-----------------------------------*\
    #HEADER
  \*-----------------------------------*/

.header {
    position: fixed;
    padding-block: 15px;
    width: 100%;
    background-color: #fbe4d8;
    height: 65px;
    box-shadow: var(--shadow);
    overflow: hidden;
    transition: 0.25s var(--cubic-out);
    z-index: 4;
}

.header.nav-active {
    height: 335px;
    transition-duration: 0.35s;
}

.header>.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    color: var(--white);
    font-family: var(--ff-poppins);
    font-size: 2.4rem;
}

.nav-toggle-btn {
    font-size: 3rem;
}

.nav-toggle-btn .close-icon,
.nav-toggle-btn.active .menu-icon {
    display: none;
}

.nav-toggle-btn.active .close-icon,
.nav-toggle-btn .menu-icon {
    display: block;
}

.navbar {
    position: absolute;
    top: 65px;
    left: 0;
    width: 100%;
    padding-inline: 20px;
    visibility: hidden;
    opacity: 0;
    transition: var(--transition-2);
}

.header.nav-active .navbar {
    visibility: visible;
    opacity: 1;
}

.navbar-link {
    color: var(--white);
    font-family: var(--ff-barlow);
    padding-block: 3px;
    transition: var(--transition-1);
}

.navbar-link:is(:hover, :focus) {
    color: var(--orange-soda);
}

.navbar .btn {
    background-color: var(--orange-soda);
    margin-block-start: 15px;
}

/*-----------------------------------*\
    #HERO
  \*-----------------------------------*/

.elem,
.rotate-img {
    display: none;
}

.hero {
    background-image: url("lill.png");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    padding-block: 100px var(--section-padding);
    min-height: 100vh;
    display: grid;
    place-items: center;
}

.hero-banner {
    width: 150px;
    height: 172px;
    background-color: var(--independence);
    border-radius: var(--radius-10);
    margin-inline: auto;
    margin-block-end: 30px;
}

.hero-banner img {
    border-radius: inherit;
}

.hero-content {
    text-align: center;
    color: var(--white);
}

.hero-title {
    font-family: var(--ff-barlow);
    font-size: var(--fs-5);
    font-weight: var(--fw-600);
    line-height: 1.3;
    margin-block-end: 14px;
}

.hero-title strong {
    font-size: var(--fs-1);
    font-weight: inherit;
    margin-block-end: 8px;
}

.hero-text {
    margin-block-end: 25px;
}

.btn-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

/*-----------------------------------*\
    #ABOUT
  \*-----------------------------------*/

.abs-img,
.abs-icon {
    display: none;
}

.about {
    padding-block-start: 120px;
    background-color: #2b124c;
}

.about-banner {
    background-color: #2b124c;
    border-radius: var(--radius-10);
    margin-block-end: 30px;
}

.about-banner>.img-cover {
    border-radius: inherit;
}

.about :is(.section-title, .section-subtitle, .section-text) {
    text-align: left;
}

.about :is(.section-title, .section-text) {
    margin-block-end: 50px;
}

/*-----------------------------------*\
    #PORTFOLIO
  \*-----------------------------------*/
.portfolio {
    background-color: #522b5b;
}

.portfolio .section-title {
    margin-block-end: 18px;
}

.portfolio .section-text {
    margin-block-end: 80px;
}

.portfolio-list {
    display: grid;
    gap: 60px;
}

.portfolio-card {
    background-color: #522b5b;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    padding: 120px 20px;
    border-radius: var(--radius-20);
    font-family: var(--ff-barlow);
    color: var(--white);
    font-weight: var(--fw-600);
    transition: var(--transition-2);
}

.portfolio-list>li:nth-child(even) .card-content {
    margin-inline-start: auto;
}

.portfolio-card .card-subtitle {
    color: var(--orange-soda);
    margin-block-end: 5px;
}

.portfolio-card .card-title {
    max-width: 20ch;
    margin-block-end: 20px;
}

.portfolio-card .btn-link {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: var(--fs-6);
    text-transform: uppercase;
}

.portfolio-card .btn-link ion-icon {
    color: var(--orange-soda);
    font-size: 1.6rem;
}

/*-----------------------------------*\
    #SKILLS
  \*-----------------------------------*/

.skills .section-title {
    margin-block-end: 20px;
}

.skills .section-text {
    margin-block-end: 70px;
}

.skills-list {
    display: none;
    /* Hide the entire skill list */
}

.skills-item .wrapper {
    display: none;
    /* Hide the skill item wrappers */
}

.skills-title,
.skills-data {
    display: none;
    /* Hide skill titles and data */
}

.skills {
    background-color: #854f6c;
    /* Change this to the color you want */
}

/*-----------------------------------*\
    #CONTACT
  \*-----------------------------------*/
.contact {
    background-color: #fbe4d8;
}

.contact-card {
    background-color: var(--midnight-blue);
    padding: 50px 25px;
    border-radius: var(--radius-20);
}

.contact-card .card-subtitle {
    color: var(--orange-soda);
    font-family: var(--ff-barlow);
    font-size: var(--fs-4);
    font-weight: var(--fw-600);
}

.contact .section-title {
    text-align: left;
    margin-block-end: 30px;
}

.contact-form {
    margin-block-end: 50px;
}

.contact-input {
    background-color: var(--white);
    color: var(--manatee);
    border-radius: var(--radius-5);
    padding: 15px 25px;
    font-size: var(--fs-5);
    margin-block-end: 15px;
}

.contact-input::placeholder {
    color: inherit;
}

textarea.contact-input {
    resize: vertical;
    min-height: 100px;
    height: 180px;
    max-height: 300px;
}

.contact-input[type="number"] {
    background-color: var(--white);
    /* Example background color */
    color: var(--manatee);
    /* Example text color */
    border-radius: var(--radius-5);
    padding: 15px 25px;
    font-size: var(--fs-5);
    margin-block-end: 15px;
    /* Add any additional styling you want here */
}

.btn-submit {
    background-color: var(--orange-soda);
    color: var(--white);
    font-family: var(--ff-barlow);
    font-size: var(--fs-5);
    width: 100%;
    padding: 10px;
    border-radius: var(--radius-5);
    transition: var(--transition-2);
}

.btn-submit:is(:hover, :focus) {
    background-color: var(--white);
    color: var(--black);
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 15px;
}

.contact-item:not(:last-child) {
    margin-block-end: 20px;
}

.contact-icon {
    background-color: var(--glaucous);
    font-size: 2.4rem;
    padding: 20px;
    border-radius: 50%;
}

.contact-item-title {
    color: var(--white);
    font-family: var(--ff-barlow);
    font-size: var(--fs-4);
    font-weight: var(--fw-600);
}

.contact-item-link {
    transition: var(--transition-1);
}

.contact-item-link:not(address):is(:hover, :focus) {
    color: var(--white);
}

/*-----------------------------------*\
    #BLOG
  \*-----------------------------------*/

.blog {
    background-color: #dfb6b2;
    padding-block-end: 120px;
}

.blog .section-title {
    margin-block-end: 20px;
}

.blog .section-text {
    margin-block-end: 80px;
}

.blog-list {
    display: grid;
    gap: 40px;
}

.blog-card {
    font-family: var(--ff-barlow);
}

.blog-card .card-banner {
    background-color: var(--independence);
    border-radius: var(--radius-15);
    overflow: hidden;
    margin-block-end: 20px;
}

.blog-card .card-banner img {
    transition: var(--transition-2);
}

.blog-card .card-banner a:is(:hover, :focus) img {
    transform: scale(1.1);
}

.blog-card .card-banner:focus-within {
    outline: 2px solid var(--white);
    outline-offset: 4px;
}

.blog-card .card-tag {
    color: var(--orange-soda);
    margin-block-end: 5px;
}

.blog-card .card-title {
    color: var(--white);
    font-weight: var(--fw-600);
    line-height: 1.3;
}

.blog-card .card-title a {
    transition: var(--transition-2);
}

.blog-card .card-title a:is(:hover, :focus) {
    color: var(--orange-soda);
}

/*-----------------------------------*\
    #FOOTER
  \*-----------------------------------*/

.footer {
    background-color: var(--independence);
    padding-block: 60px;
}

.copyright {
    max-width: max-content;
    margin-inline: auto;
    margin-block-end: 10px;
}

.copyright-link {
    display: inline-block;
    transition: var(--transition-2);
    font-weight: var(--fw-600);
}

.copyright-link:is(:hover, :focus) {
    color: var(--white);
}

.footer-list {
    max-width: max-content;
    margin-inline: auto;
}

.footer-list * {
    display: inline-block;
}

.footer-list>li:not(:last-child) {
    margin-inline-end: 40px;
}

.footer-link {
    transition: var(--transition-2);
}

.footer-link:is(:hover, :focus) {
    color: var(--white);
}

/*-----------------------------------*\
    #BACK TO TOP
  \*-----------------------------------*/

.back-to-top {
    color: var(--white);
    font-size: 1.3rem;
    position: fixed;
    bottom: 160px;
    right: -30px;
    transform: rotate(0.25turn);
    opacity: 0;
    visibility: hidden;
    transition: var(--transition-2);
    z-index: 1;
}

.back-to-top.active {
    right: -5px;
    opacity: 1;
    visibility: visible;
}

.back-to-top::after {
    content: "";
    position: absolute;
    top: 10px;
    left: calc(100% + 7px);
    width: 100px;
    height: 1px;
    background-color: var(--white);
}

/*-----------------------------------*\
    #MEDIA QUERIES
  \*-----------------------------------*/

/**
   * responsive for larger than 600px screen
   */

@media (min-width: 600px) {
    /**
     * PORTFOLIO
     */

    .portfolio-list li:nth-child(even) .card-content {
        margin-inline-start: 50%;
    }
}

/**
   * responsive for larger than 768px screen
   */

@media (min-width: 768px) {
    /**
     * PORTFOLIO
     */

    .portfolio-card {
        background-size: 115%;
        padding-inline: 80px;
    }

    .portfolio-card:is(:hover, :focus) {
        background-size: 130%;
    }

    /**
     * SKILLS, BLOG
     */

    .skills-list,
    .blog-list {
        grid-template-columns: 1fr 1fr;
        column-gap: 50px;
    }
}

/**
   * responsive for larger than 992px screen
   */

@media (min-width: 992px) {
    /**
     * CUSTOM PROPERTY
     */

    :root {
        /**
       * typography
       */

        --fs-1: 6.4rem;
        --fs-2: 3.5rem;
        --fs-3: 3.6rem;

        /**
       * spacing
       */

        --section-padding: 80px;
    }

    /**
     * REUSED STYLE
     */

    .container {
        max-width: 1050px;
        margin-inline: auto;
    }

    /**
     * HEADER
     */

    .nav-toggle-btn {
        display: none;
    }

    .header,
    .header.nav-active {
        background-color: transparent;
        box-shadow: none;
        height: unset;
        padding-block: 30px;
    }

    .header.active {
        background-color: var(--space-cadet);
        box-shadow: var(--shadow);
        padding-block: 20px;
    }

    .navbar {
        all: unset;
    }

    .navbar-list {
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .navbar .btn {
        margin-block-start: 0;
        --padding: 7px 30px;
    }

    /**
     * HERO
     */

    .hero .container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
    }

    .hero-content {
        text-align: left;
    }

    .btn-group {
        justify-content: flex-start;
    }

    .hero-title span {
        font-size: 3rem;
    }

    .hero-title {
        --fs-5: 2.2rem;
        margin-block-end: 25px;
    }

    .hero-text {
        margin-block-end: 25px;
        font-size: var(--fs-5);
    }

    .hero-banner {
        position: relative;
        margin-block-end: 0;
        order: 1;
        width: 340px;
        height: 390px;
        margin-inline: 0;
        margin-inline-start: auto;
    }

    .elem {
        position: absolute;
        display: flex;
        align-items: center;
        gap: 10px;
        background-color: var(--white);
        border-radius: var(--radius-10);
        padding: 20px;
    }

    .elem-1 {
        top: 20px;
        left: -130px;
    }

    .elem-1 .elem-title {
        color: var(--vivid-sky-blue);
    }

    .elem-2 {
        bottom: 30px;
        right: -80px;
    }

    .elem-2 .elem-title {
        color: var(--fiery-rose);
    }

    .elem-title {
        font-size: 4.5rem;
        line-height: 1.1;
    }

    .elem-text {
        max-width: 10ch;
        color: var(--black);
        font-weight: var(--fw-700);
        line-height: 1.1;
    }

    .elem-3 {
        top: -40px;
        right: -30px;
    }

    .elem-3 ion-icon {
        color: var(--minion-yellow);
        font-size: 6rem;
    }

    .rotate-img {
        display: block;
        position: absolute;
        bottom: -60px;
        left: -60px;
        width: 120px;
        animation: rotate360 15s linear infinite reverse;
    }

    @keyframes rotate360 {
        0% {
            transform: rotate(0);
        }

        100% {
            transform: rotate(1turn);
        }
    }

    /**
     * ABOUT
     */

    .about {
        padding-block: 180px;
    }

    .about .container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        gap: 80px;
    }

    .about-banner {
        position: relative;
        margin-block-end: 0;
    }

    .abs-img,
    .abs-icon {
        display: block;
        position: absolute;
    }

    .abs-img {
        width: 250px;
        height: 250px;
        object-fit: cover;
        border-radius: inherit;
        bottom: -150px;
        left: -100px;
    }

    .abs-icon {
        font-size: 5rem;
        padding: 20px;
        border-radius: inherit;
    }

    .abs-icon-1 {
        top: 50px;
        left: -120px;
        background-color: var(--bluetiful);
    }

    .abs-icon-2 {
        top: -40px;
        right: -40px;
        background-color: var(--gold-web-golden);
    }

    .abs-icon-3 {
        bottom: -40px;
        left: 250px;
        background-color: var(--rufous);
    }

    /**
     * PORTFOLIO
     */

    .portfolio-card .card-subtitle {
        font-size: var(--fs-5);
    }

    .portfolio-card .btn-link {
        --fs-6: 1.6rem;
    }

    /**
     * SKILLS
     */

    .skills-list {
        column-gap: 100px;
    }

    /**
     * CONTACT
     */
    .contact {
        background-color: #854f6c;
    }

    .contact-card {
        padding: 100px;
        background-color: #522b5b;
        color: lightcoral;

    }

    .contact .wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
    }

    .contact-form {
        margin-block-end: 0;
    }

    .contact-item {
        gap: 25px;
    }

    .contact-icon {
        padding: 30px;
    }

    /**
     * BLOG
     */

    .blog {
        padding-block-end: 180px;
    }

    .blog-list {
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    /**
     * FOOTER
     */

    .footer .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .copyright,
    .footer-list {
        margin-inline: 0;
    }
}

.prices {
    background-color: blueviolet;
}

.section.skills {
    background-color: #704264;
    padding: 60px 0;
}

.price-list {
    display: flex;
    justify-content: space-between;
}

.price-division {
    width: 48%;
    margin-left: 25%;
}

.price-item {
    background-color: #fff;
    /* White background */
    border: 1px solid #ddd;
    /* Light gray border */
    border-radius: 5px;
    /* Rounded corners */
    padding: 15px;
    /* Add padding inside the container */
    margin-bottom: 15px;
    /* Add margin between each service item */
    text-align: center;
}

.division-title {
    text-align: center;
}

.price-details {
    flex-grow: 1;
}

.price-title {
    font-size: 20px;
    margin-bottom: 5px;
}

.price-amount {
    color: #ff5e14;
    font-size: 18px;
    margin: 0;
}




.footer {
    text-align: center;
}

:root {
    --rich-black-fogra-39_50: hsla(0, 0%, 5%, 0.5);
    --rich-black-fogra-39: hsl(0, 0%, 5%);
    --indian-yellow_10: hsla(36, 61%, 58%, 0.1);
    --indian-yellow: hsl(36, 61%, 58%);
    --harvest-gold: hsl(36, 66%, 53%);
    --eerie-black-1: hsl(0, 0%, 14%);
    --eerie-black-2: hsl(0, 0%, 12%);
    --eerie-black-2_85: hsla(0, 0%, 12%, 0.85);
    --eerie-black-3: hsl(0, 0%, 8%);
    --sonic-silver: hsl(0, 0%, 44%);
    --davys-gray: hsl(210, 9%, 31%);
    --light-gray: hsl(0, 0%, 80%);
    --platinum: hsl(0, 0%, 91%);
    --black_30: hsla(0, 0%, 0%, 0.3);
    --white_10: hsla(0, 0%, 100%, 0.1);
    --white_30: hsla(0, 0%, 100%, 0.3);
    --white_50: hsla(0, 0%, 100%, 0.5);
    --white: hsl(0, 0%, 100%);
    --jet: hsl(0, 0%, 21%);
    --chinese-violet_30: hsla(304, 14%, 46%, 0.3);
    --chinese-violet: hsl(304, 14%, 46%);
    --sonic-silver: hsl(208, 7%, 46%);
    --old-rose_30: hsla(357, 37%, 62%, 0.3);
    --ghost-white: hsl(233, 33%, 95%);
    --light-pink: hsl(357, 93%, 84%);
    --light-gray: hsl(0, 0%, 80%);
    --old-rose: hsl(357, 37%, 62%);
    --seashell: hsl(20, 43%, 93%);
    --charcoal: hsl(203, 30%, 26%);
    --white: hsl(0, 0%, 100%);

    /*** typography*/

    --ff-oswald: 'Oswald', sans-serif;
    --ff-rubik: 'Rubik', sans-serif;

    --fs-40: 4rem;
    --fs-30: 3rem;
    --fs-24: 2.4rem;
    --fs-18: 1.8rem;
    --fs-14: 1.4rem;
    --fs-13: 1.3rem;

    --fw-300: 300;
    --fw-500: 500;
    --fw-600: 600;
    --fw-700: 700;
    --ff-philosopher: 'Philosopher', sans-serif;
    --ff-poppins: 'Poppins', sans-serif;

    --fs-1: 4rem;
    --fs-2: 3.2rem;
    --fs-3: 2.7rem;
    --fs-4: 2.4rem;
    --fs-5: 2.2rem;
    --fs-6: 2rem;
    --fs-7: 1.8rem;

    --fw-500: 500;
    --fw-700: 700;
    /** spacing*/

    --section-padding: 80px;

    /*** shadow*/

    --shadow-1: 10px 0 60px hsla(0, 0%, 15%, 0.07);
    --shadow-2: 10px 0 60px hsla(0, 0%, 15%, 0.1);
    --shadow-1: 4px 6px 10px hsla(231, 94%, 7%, 0.06);
    --shadow-2: 2px 0 15px 5px hsla(231, 94%, 7%, 0.06);
    --shadow-3: 3px 3px var(--chinese-violet);
    --shadow-4: 5px 5px var(--chinese-violet);
    /*** radius*/

    --radius-5: 5px;
    --radius-8: 8px;
    --radius-5: 5px;
    --radius-10: 10px;
    /*** transition*/

    --transition-1: 0.25s ease;
    --transition-2: 0.5s ease;
    --cubic-out: cubic-bezier(0.33, 0.85, 0.4, 0.96);
    --transition-1: 0.25s ease;
    --transition-2: 0.5s ease;
    --cubic-out: cubic-bezier(0.33, 0.85, 0.4, 0.96);
}


/*-----------------------------------*\#RESET\*-----------------------------------*/

*,
*::before,
*::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

li {
    list-style: none;
}

a,
img,
span,
data,
input,
select,
button,
textarea,
ion-icon {
    display: block;
}

a {
    color: inherit;
    text-decoration: none;
}

img {
    height: auto;
}

input,
select,
button,
textarea {
    background: none;
    border: none;
    font: inherit;
}

input,
select,
textarea {
    width: 100%;
}

button {
    cursor: pointer;
}

ion-icon {
    pointer-events: none;
}

address {
    font-style: normal;
}

html {
    font-family: var(--ff-rubik);
    font-size: 10px;
    scroll-behavior: smooth;
}

body {
    background-color: var(--white);
    color: var(--sonic-silver);
    font-size: 1.6rem;
    line-height: 2;
}

:focus-visible {
    outline-offset: 4px;
}

::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background-color: hsl(0, 0%, 98%);
}

::-webkit-scrollbar-thumb {
    background-color: hsl(0, 0%, 80%);
}

::-webkit-scrollbar-thumb:hover {
    background-color: hsl(0, 0%, 70%);
}





/*-----------------------------------*\#REUSED STYLE\*-----------------------------------*/

.container {
    padding-inline: 15px;
}

.section {
    padding-block: var(--section-padding);
}

.has-before,
.has-after {
    position: relative;
    z-index: 1;
}

.has-before::before,
.has-after::after {
    position: absolute;
    content: "";
}

.has-bg-image {
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}

.h1,
.h2,
.h3 {
    font-family: var(--ff-oswald);
    line-height: 1.3;
}

.h1,
.h2 {
    text-transform: uppercase;
}

.h1,
.h3 {
    font-weight: var(--fw-600);

}

.h1 {
    color: var(--orange);
    font-size: var(--fs-40);
}

.h2,
.h3 {
    color: var(--orange);
}

.h2 {
    font-size: var(--fs-30);
}

.h3 {
    font-size: var(--fs-24);
}

.btn {
    color: var(--white);
    background-color: var(--indian-yellow);
    display: flex;
    align-items: center;
    gap: 10px;
    max-width: max-content;
    padding: 10px 25px;
    font-family: var(--ff-oswald);
    font-size: var(--fs-14);
    font-weight: var(--fw-600);
    text-transform: uppercase;
    border-radius: var(--radius-5);
    overflow: hidden;
}

.btn::before {
    background-color: var(--eerie-black-1);
    inset: 0;
    z-index: -1;
    transform: skewY(-15deg) scaleY(0);
    transition: var(--transition-2);
}

.btn:is(:hover, :focus)::before {
    transform: skewY(-15deg) scaleY(2.5);
}

.text-center {
    text-align: center;
}

.grid-list {
    display: grid;
    gap: 30px;
}

.img-holder {
    aspect-ratio: var(--width) / var(--height);
    background-color: var(--light-gray);
    overflow: hidden;
}

.img-cover {
    width: 100%;
    height: 100%;
    object-fit: cover;
}


/*-----------------------------------*\#PRICING\*-----------------------------------*/

.pricing::before {
    inset: 0;
    background-color: var(--eerie-black-2_85);
    mix-blend-mode: multiply;
    z-index: -1;
}

.pricing .section-title {
    color: var(--purple);
}

.pricing .section-text {
    margin-block: 15px 55px;
    color: var(--lavander);
}

.pricing-tab-container {
    background-color: var(--lavander);
    padding: 40px 5px;
}

.tab-filter {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 3px;
    margin-block-end: 30px;
}

.filter-btn {
    color: var(--eerie-black-1);
    font-family: var(--ff-oswald);
    font-size: var(--fs-14);
    font-weight: var(--fw-600);
    text-transform: uppercase;
    min-width: 130px;
    padding-block: 12px;
    border: 1px solid var(--platinum);
    transition: var(--transition-1);
}

.filter-btn .btn-icon {
    display: none;
}

.filter-btn.active {
    background-color: var(--indian-yellow);
    border-color: var(--indian-yellow);
    color: var(--white);
}

.pricing .grid-list {
    padding-inline: 20px;
}

.pricing .grid-list>li.active {
    animation: popup 0.75s ease forwards;
}

@keyframes popup {

    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }

}

.pricing-card {
    background-color: var(--indian-yellow_10);
    padding: 20px 25px;
    border-radius: var(--radius-5);
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 15px;
}

.pricing-card .card-banner {
    border-radius: 50%;
    overflow: hidden;
}

.pricing-card .wrapper {
    order: 1;
}

.pricing-card .h3 {
    color: #ff5e14;
    --fs-24: 2rem;
    margin-block-end: 8px;
}

.pricing-card .card-price {
    color: var(--indian-yellow);
    font-family: var(--ff-oswald);
    font-size: var(--fs-30);
    font-weight: var(--fw-500);
}


/*-----------------------------------*\#MEDIA QUERIES\*-----------------------------------*/

/*** responsive for large than 575px screen*/

@media (min-width: 575px) {

    /*** CUSTOM PROPERTY*/

    :root {

        /*** typography*/

        --fs-40: 6rem;

    }



    /*** REUSED STYLE*/

    .container,
    .header-top {
        max-width: 540px;
        width: 100%;
        margin-inline: auto;
    }

    .btn {
        padding: 13px 40px;
    }

    .h2 {
        --fs-30: 3.5rem;
    }


    /*** PRICING*/

    .filter-btn .btn-icon {
        display: block;
        font-size: 55px;
        line-height: 1;
        margin-block-end: 5px;
    }

    .pricing-card {
        flex-wrap: nowrap;
        align-items: center;
        gap: 30px;
    }

    .pricing-card .wrapper {
        order: 0;
    }

    .pricing-card .card-price {
        align-self: flex-start;
        line-height: 1.6;


    }
}

/*** responsive for large than 768px screen*/

@media (min-width: 768px) {

    /*** CUSTOM PROPERTY*/

    :root {

        /*** typography*/

        --fs-40: 8rem;

    }



    /*** REUSED STYLE*/

    .container {
        max-width: 720px;
    }

    .h2 {
        --fs-30: 4rem;
    }

    .section-text {
        max-width: 50ch;
        margin-inline: auto;
    }

    /*** PRICING*/

    .pricing-tab-container {
        padding: 40px;
    }

    .pricing-card .wrapper {
        margin-inline-end: auto;
    }
}

/*** responsive for large than 992px screen*/

@media (min-width: 992px) {

    /*** CUSTOM PROPERTY*/

    :root {

        /*** typography*/

        --fs-40: 10rem;

    }



    /*** REUSED STYLE*/

    .container {
        max-width: 960px;
    }

    /*** PRICING*/

    .pricing .grid-list {
        grid-template-columns: 1fr 1fr;
    }

    .pricing-card {
        height: 100%;
    }

    .pricing-card .card-banner {
        flex-shrink: 0;
    }
}

@media (min-width: 1200px) {

    /*** CUSTOM PROPERTY*/

    :root {

        /*** typography*/

        --fs-40: 11rem;

        /*** spacing*/

        --section-padding: 120px;

    }



    /*** REUSED STYLE*/

    .container {
        max-width: 1200px;
    }

    /*** PRICING*/

    .filter-btn {
        min-width: 178px;
    }

}
    </style>

    <body id="top">


        <div class="container glass"></div>

        <!--- #HEADER --->

        <header class="header" data-header>
            <div class="container">

                <a href="#">
                    <h1 class="logo">LUCHIES</h1>
                </a>

                <button class="nav-toggle-btn" aria-label="Toggle Menu" data-nav-toggle-btn>
                    <ion-icon name="menu-outline" class="menu-icon"></ion-icon>
                    <ion-icon name="close-outline" class="close-icon"></ion-icon>
                </button>

                <nav class="navbar container">
                    <ul class="navbar-list">

                        <li>
                            <a href="#home" class="navbar-link" data-nav-link>Home</a>
                        </li>

                        <li>
                            <a href="#about" class="navbar-link" data-nav-link>About</a>
                        </li>

                        <li>
                            <a href="#services" class="navbar-link" data-nav-link>Services</a>
                        </li>

                        <li>
                            <a href="#prices" class="navbar-link" data-nav-link>Prices</a>
                        </li>

                        <li>
                            <a href="#contact" class="navbar-link" data-nav-link>Contact</a>
                        </li>

                        <li>
                            <a href="#gallery" class="navbar-link" data-nav-link>Gallery</a>
                        </li>



                    </ul>
                </nav>

            </div>
        </header>
        <!-- Cookie Overlay -->






        <main>
            <article>

                <!--#HERO-->
                <section class="hero" id="home">
                    <div class="container">

                        <div class="hero-banner">

                            <img src="lil.png" width="800" height="864" loading="lazy" alt="Luchie's Photo"
                                class="img-cover">

                            <div class="elem elem-1">
                                <p class="elem-title">39</p>

                                <p class="elem-text">Years of Success</p>
                            </div>

                            <div class="elem elem-2">
                                <p class="elem-title">1985</p>

                                <p class="elem-text">Business Established</p>
                            </div>

                            <div class="elem elem-3">
                                <ion-icon name="trophy"></ion-icon>
                            </div>

                        </div>

                        <div class="hero-content">

                            <h2 class="hero-title">
                                <span>Hello We Are</span>
                                <strong>LUCHIES</strong> A Beauty Parlor from Nagcarlan, Laguna
                            </h2>

                            <p class="hero-text">
                                Continue to serve your beauty with Luchie's Salon!
                            </p>

                            <div class="btn-group">
                                <a href="#contact" class="btn btn-primary blue">Book Now!</a>
                            </div>

                        </div>

                    </div>
                </section>





                <!--- #ABOUT --->

                <section class="section about" id="about">
                    <div class="container">

                        <figure class="about-banner">

                            <img src="about.jpg" width="800" height="652" loading="lazy" alt="Ethan's Photo"
                                class="img-cover">
                            <div class="elem elem-1">
                                <p class="elem-title">39</p>

                                <p class="elem-text">Years of Success</p>
                            </div>


                            <div class="elem elem-3">
                                <ion-icon name="trophy"></ion-icon>
                            </div>



                        </figure>

                        <div class="about-content">

                            <p class="section-subtitle"></p>

                            <h2 class="h2 section-title">ABOUT US</h2>

                            <p class="section-text"> Luchie's Salon, which has been around since 1985 in Nagcarlan,
                                Laguna.
                                Discover the beauty and style with our salon, We will make sure you leave with
                                confidence
                                and radiance.
                            </p>

                            <p class="section-text">
                                Experience our affordable beauty services and rely on us to deliver our promise of
                                expert
                                service
                                where beauty and quality meet.

                        </div>

                    </div>
                </section>



                <!--- #SERVICES/PORTFOLIO --->

                <section class="section portfolio" id="services">
                    <div class="container">

                        <p class="section-subtitle">OUR</p>

                        <h2 class="h2 section-title">SERVICES</h2>

                        <p class="section-text">
                            SERVICE POLICY: Once you've received our service, refunds are not provided. However, if
                            you're
                            dissatisfied within a week, we will make adjustments.
                            Just return to the salon for us to assess the situation. We will do our best to fix any
                            issues
                            with no extra charge.
                        </p>

                        <ul class="portfolio-list">

                            <li>
                                <a href="#prices" class="portfolio-card" style="background-image: url('uno.png')">
                                    <div class="card-content">

                                        <p class="card-subtitle">HAIR</p>

                                        <h3 class="h3 card-title">Haircut, Shampoo & Style, Color, Perm, Hot-Oil, Rebond
                                        </h3>


                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#prices" class="portfolio-card" style="background-image: url('dosh.png')">
                                    <div class="card-content">

                                        <p class="card-subtitle">WAXING/MAKEUP/LASH</p>

                                        <h3 class="h3 card-title">Brows, Makeup Application, Lash Tint, Lashes</h3>


                                    </div>
                                </a>
                            </li>

                        </ul>

                    </div>
                </section>



                <?php $servername="localhost" ; $username="root" ; $password="" ; $dbname="ne" ; 
                $conn=new mysqli($servername, $username, $password, $dbname); // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    $sql_prices = "SELECT * FROM prices";
                    $result_prices = $conn->query($sql_prices);
                    ?>


                <!-- - #PRICING-->




                <section id="prices">

                    <section class="section price" id="price">
                        <div class="container">
                            <section class="section pricing has-bg-image has-before" id="pricing" aria-label="pricing"
                                style="background-image: url('wan.jpg')">
                                <div class="container">
                                    <h2 class="h2 section-title text-center">Pricing
                                    </h2>
                                    <p class="section-text text-center">PRICE POLICY:
                                        The cost of certain services may vary depending
                                        on your hair length, contrary to what is stated.
                                    </p>
                                    <div class="pricing-tab-container">
                                        <ul class="grid-list">
                                            <?php
                                while ($row = $result_prices->fetch_assoc()) {
                                    echo '<li data-filter="service">';
                                    echo '<div class="pricing-card">';
                                    echo '</figure>';
                                    echo '<div class="wrapper">';
                                    echo '<h3 class="h3 card-title">' . htmlspecialchars($row['service_name']) . '</h3>';
                                    echo '<p class="card-text">Service Duration</p>';
                                    echo '</div>';
                                    echo '<data class="card-price" value="' . htmlspecialchars($row['price']) . '">' . htmlspecialchars($row['price']) . ' PHP</data>';
                                    echo '</div>';
                                    echo '</li>';
                                }
                            ?>
                                        </ul>
                                    </div>

                                </div>
                            </section>
                        </div>
                    </section>

                </section>



                <!--- #CONTACT --->



                <section class="section contact" id="contact">
                    <div class="container">

                        <div class="contact-card">



                            <h2 class="h2 section-title">CONTACT US</h2>
                            <p class="section-text"> IMPORTANT POLICY: WE ARE CLOSED
                                EVERY MONDAY, AND WALK-INS ARE STRICTLY
                                PROHIBITED. </p>

                            <div class="wrapper">

                                <form action="SUBMIT.php" method="POST" class="contact-form">
                                    <input type="text" name="name" placeholder="Name" required class="contact-input">
                                    <input type="number" name="phone" placeholder="Phone Number" required
                                        class="contact-input">
                                    <input type="email" name="email" placeholder="Email" required class="contact-input">
                                    <textarea name="message" placeholder="Message" required
                                        class="contact-input"></textarea>
                                    <button type="submit" class="btn-submit">Submit</button>
                                </form>





                                <ul class="contact-list">

                                    <li class="contact-item">

                                        <?php
    // Include database connection

    $servername = "localhost"; // Change this to your database server name
    $username = "root"; // Change this to your database username
    $password = "password123.."; // Change this to your database password
    $dbname = "ne"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch contact information from the database
    $sql = "SELECT * FROM contactinformation";
    $result = $conn->query($sql);

    // Check if there is at least one row of contact information
    if ($result->num_rows > 0) {
        // Fetch and store the contact information in an array
        $contacts = $result->fetch_assoc();

        // Display the contact information
        echo "<div class='contact-info'>";
        echo "<p>Email: {$contacts['Email']}</p><br>";
        echo "<p>Phone: {$contacts['Phone']}</p><br>";
        echo "<p>Address: {$contacts['Address']}</p><br>";
        echo "</div>";
    } else {
        // No contact information available
        echo "<p>Contact information not available.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>
                </section>



            </article>
        </main>





        <!--- #FOOTER --->

        <footer class="footer">
            <div class="container">

                <p class="copyright">
                    &copy; 2024 <a href="#" class="copyright-link">luchiesalon</a>.
                    All Rights Reseverd
                </p>



            </div>
        </footer>






        <a href="#top" class="back-to-top" data-back-to-top>BACK TOP</a>
        <!-- Scripts -->
        <script src="style.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">
        </script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js">
        </script>


    </body>


    </html>