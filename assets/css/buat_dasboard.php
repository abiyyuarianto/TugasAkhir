<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<style>
    .judul {
        font-family: 'Oleo Script', cursive;
        font-size: 30pt;
        text-align: center;
        color: white;
    }

    .jud-bawah {
        font-size: 12pt;
        text-align: center;
        color: black;
        margin: -1px 0 0 0;
    }

    .profile {
        text-align: center;
        margin-left: -462px;
        color: azure;
        margin-top: 17px;
    }

    .awal {
        width: 60vw;
        margin-left: 325px;
    }

    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        left: 23px;
        z-index: 3;
        font-size: 18px;
        border: none;
        outline: none;
        background: rgb(9, 255, 0);
        background: -moz-linear-gradient(163deg, rgba(9, 255, 0, 1) 0%, rgba(17, 170, 255, 1) 0%, rgba(255, 239, 0, 1) 100%);
        background: -webkit-linear-gradient(163deg, rgba(9, 255, 0, 1) 0%, rgba(17, 170, 255, 1) 0%, rgba(255, 239, 0, 1) 100%);
        background: linear-gradient(163deg, rgba(9, 255, 0, 1) 0%, rgba(17, 170, 255, 1) 0%, rgba(255, 239, 0, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#09ff00", endColorstr="#ffef00", GradientType=1);
        color: darkred;
        cursor: pointer;
        padding: 15px;
        border-radius: 100%;
    }

    #myBtn:hover {
        background-color: #555;
    }

    .table2 {
        font-family: sans-serif;
        color: #444;
        border-collapse: collapse;
        width: 96%;
        height: 70px;
        border: none;
        text-align: center;
        margin-left: 15px;
    }

    .table2 tr th {
        background: #35A9DB;
        color: #fff;
        font-weight: normal;
    }

    .table2 th td {
        padding: 2px 3px;
        text-align: center;
    }

    /* pemisah */
    .table1 {
        font-family: sans-serif;
        color: #444;
        border-collapse: collapse;
        width: 100%;
        height: 90px;
        border: 1px solid #f2f5f7;
    }

    .table1 tr th {
        background: #35A9DB;
        color: #fff;
        font-weight: normal;
    }

    .table1 th td {
        padding: 19px 20px;
        text-align: center;
    }

    th,
    td {
        padding: 8px 20px;
        text-align: center;
    }

    .table1 tr:hover {
        background-color: wheat;
    }

    .table1 tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .atur_tombol {
        margin-bottom: 510px;
    }

    .boton {
        border-color: dimgray;
        border-radius: 4px;
        border: 12px;
    }

    .tabel2 {
        border-collapse: collapse;
        border-spacing: 0;
        border: 1px solid #ddd;
        border-bottom: none;
        font-weight: bold;
        color: #000000;
        font-size: 16px;
        width: 100%;
        height: 100%;

    }

    .tabel2 th {
        width: 190px;
    }

    .tabel2 tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .tabel3 {
        border: none;
        color: #000000;
        font-size: 16px;
        width: 160%;
    }

    .tabel3 th td {
        width: 90px;

    }

    .menu {
        /* position: relative; */
        text-align: center;
        width: 56vw;
        margin-left: 270px;
    }

    #tambah {
        text-decoration: none;
    }

    .tagline {
        background: rgb(9, 255, 0);
        background: -moz-linear-gradient(163deg, rgba(9, 255, 0, 1) 0%, rgba(0, 164, 255, 1) 0%, rgba(255, 89, 0, 1) 100%);
        background: -webkit-linear-gradient(163deg, rgba(9, 255, 0, 1) 0%, rgba(0, 164, 255, 1) 0%, rgba(255, 89, 0, 1) 100%);
        background: linear-gradient(163deg, rgba(9, 255, 0, 1) 0%, rgba(0, 164, 255, 1) 0%, rgba(255, 89, 0, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#09ff00", endColorstr="#ff5900", GradientType=1);
        /* background-color: transparent; */
        border: 3px solid whitesmoke;
        opacity: 0.9;
    }

    body {
        background: url('assets/gambar/bg-03.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    table thead {
        background: rgb(30, 172, 169);
        background: -moz-linear-gradient(163deg, rgba(30, 172, 169, 1) 0%, rgba(2, 29, 33, 1) 100%);
        background: -webkit-linear-gradient(163deg, rgba(30, 172, 169, 1) 0%, rgba(2, 29, 33, 1) 100%);
        background: linear-gradient(163deg, rgba(30, 172, 169, 1) 0%, rgba(2, 29, 33, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#1eaca9", endColorstr="#021d21", GradientType=1);
        color: #fff;
        text-transform: uppercase;
        font-family: Arial, Helvetica, sans-serif;
    }

    .anim {
        width: 100px;
        height: 30px;
        text-align: center;
        margin: auto;
    }

    .icon {
        margin-left: -13px;
        color: orangered;
        margin-top: 0px;
        font-size: 2px;
        /* position: relative; */
        transition: 1s;
    }

    .icon2 {
        margin-left: 13px;
        margin-top: -27px;
        font-size: 2px;
        transition: 1s;
        color: orangered;
    }

    .tulisan {
        opacity: 0;
        /* position: absolute; */
        margin-top: -23px;
        margin-left: 0px;
        text-align: center;
        font-size: 9px;
        transition: 0.5s;
    }

    .anim:hover .icon {
        margin-left: -69px;
        padding-right: 25px;
    }

    .anim:hover .icon2 {
        margin-left: 95px;
    }

    .anim:hover .tulisan {
        opacity: 1;
        transition: 1.2s;
    }

    #myInput {
        background-image: url('../../assets/gambar/search-2.png');
        background-color: whitesmoke;
        border-radius: 4px;
        background-position: 10px 12px;
        background-repeat: no-repeat;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 4px solid darkred;
        margin-top: 3px;
        margin-left: 15px;
        float: left;
        font-family: 'Oleo Script', cursive;
        width: 130px;
        -webkit-transition: width 0.7s ease-in-out;
        transition: width 0.4s ease-in-out;
    }

    /* When the input field gets focus, change its width to 100% */
    #myInput:focus {
        width: 23%;
    }

    cite {
        font-family: 'Times New Roman', Times, serif;
        border-radius: 12px;

        color: #ccc;
    }


    #search {
        background-image: url('../../assets/gambar/search-2.png');
        background-color: whitesmoke;
        border-radius: 4px;
        background-position: 10px 12px;
        background-repeat: no-repeat;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 4px solid darkred;
        margin-top: 3px;
        margin-left: 15px;
        float: left;
        font-family: 'Oleo Script', cursive;
        width: 130px;
        -webkit-transition: width 0.7s ease-in-out;
        transition: width 0.4s ease-in-out;
    }

    /* When the input field gets focus, change its width to 100% */
    #search:focus {
        width: 30%;
    }


    .container {
        display: inline-block;
        cursor: pointer;
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 0px;
        width: 56vw;
        z-index: 1;
    }

    .bar1,
    .bar2,
    .bar3 {
        width: 35px;
        height: 5px;
        background-color: oldlace;
        margin: 6px 0;
        transition: 0.7s;
    }

    .change .bar1 {
        -webkit-transform: rotate(-45deg) translate(-9px, 6px);
        transform: rotate(-45deg) translate(-9px, 6px);
    }

    .change .bar2 {
        opacity: 0;
    }

    .change .bar3 {
        -webkit-transform: rotate(45deg) translate(-8px, -8px);
        transform: rotate(45deg) translate(-8px, -8px);
    }

    #bungkus {
        opacity: 0;
        display: block;
        margin-left: 127px;
        transition: 0.7s;
    }

    .change #bungkus {
        opacity: 1;
        transition: 1.2s;
    }

    #bungkus button {
        border: 3px solid #ddd;
        ;
    }

    #bungkus button:hover {
        border: 3px solid #ddd;
        ;
    }

    /* .sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
    } */


    /* The Modal (background) */
    .modall {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modall-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 30%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modall {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 999;
        /* Sit on top */
        padding-top: auto;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modall-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 100%;
        height: auto;
        width: 634px;
        height: 565px;
        left: 6%;
        right: auto;
        margin-top: -45px;
        margin-left: auto;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-mini {
        width: 300px;
    }

    .button-modal {
        margin-left: 85px;
    }

    @media (max-width:480px) {
        .modall {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 9999;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modall-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }


        .modall {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: auto;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modall-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 100%;
            height: auto;
            width: 300px;
            height: 565px;
            left: 6%;
            right: auto;
            margin-top: -45px;
            margin-left: auto;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-mini {
            width: 250px;
        }

        .button-modal {
            margin-left: 5px;
        }
    }


    #buatPV:hover {
        border: none;
    }

    /* .show {
            background-color: maroon;
            border-radius: 5px;
            border: 2px solid black;
            color: white;
            width: 140px;
            height: 40px;
            margin-left: 1180px;
            margin-top: -680px;
            margin-bottom: 30px;
        } */
    .footer {
        height: 60px;
        background: darkslategray;
        color: #fff;
        bottom: 0px;
        width: 98vw;
        /*biar memenuhi layar*/
        margin-top: 12px;
        margin-left: -6px;
        border: 1px solid cyan;
        height: 30px;
        text-align: center;
    }

    .card-head {

        background: #ddd;
        height: 59px;
    }

    .card-foot {
        background: #ddd;
        height: 35px;
        border-top: 4px solid darkgoldenrod;
    }

    .card-foot p {
        text-align: center;
        font-size: 12pt;
        margin: 7px auto;
        font-family: cursive;
        font-weight: bolder;
    }

    .card-foote {
        background: #ddd;
        border-top: 4px solid darkgoldenrod;
    }

    .card-foote p {
        text-align: center;
        font-size: 12pt;
        margin: auto;
        font-family: sans-serif;
        font-weight: bolder;
        height: 100%;
        letter-spacing: 2px;
    }


    .baru {
        margin: auto;
        width: 98%;
        background-color: lightslategray;
        overflow: auto;
    }

    .baru a {
        float: left;
        padding: 12px;
        color: white;
        text-decoration: none;
        font-size: 17px;
    }

    .baru a:hover {
        background-color: #000;
        color: whitesmoke;
    }

    .active1 {
        background-color: #4CAF50;
    }

    @media screen and (max-width: 500px) {
        .baru a {
            float: none;
            display: block;
        }
    }

    /* The container must be positioned relative: */
    .custom-select {
        position: relative;
        font-family: Arial;
        float: right;
    }

    .custom-select select {
        display: none;
        /*hide original SELECT element: */
    }

    .select-selected {
        background-color: DodgerBlue;
    }

    /* Style the arrow inside the select element: */
    .select-selected:after {
        position: absolute;
        content: "";
        top: 14px;
        right: 10px;
        width: 0;
        height: 0;
        border: 6px solid transparent;
        border-color: #fff transparent transparent transparent;
    }

    /* Point the arrow upwards when the select box is open (active): */
    .select-selected.select-arrow-active:after {
        border-color: transparent transparent #fff transparent;
        top: 7px;
    }

    /* style the items (options), including the selected item: */
    .select-items div,
    .select-selected {
        color: #ffffff;
        padding: 8px 16px;
        border: 1px solid transparent;
        border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
        cursor: pointer;
    }

    /* Style items (options): */
    .select-items {
        position: absolute;
        background-color: DodgerBlue;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 99;
    }

    /* Hide the items when the select box is closed: */
    .select-hide {
        display: none;
    }

    .select-items div:hover,
    .same-as-selected {
        background-color: rgba(0, 0, 0, 0.1);
    }

    .but {
        border: 4px solid whitesmoke;
        width: 130px;
        height: 40px;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 12pt;
        background-color: #35A9DB;
        color: linen;
        border-radius: 6px;
    }

    .buto {
        border: 4px solid whitesmoke;
        width: 130px;
        height: 40px;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 12pt;
        background-color: #35A9DB;
        color: linen;
        border-radius: 6px;
    }

    .modal-footer {
        margin-top: 39px;
    }

    .suggest {
        width: 220px;
    }

    .gest {
        width: 220px;
    }

    /* .suggest:hover {
        background-color: blueviolet;
    } */
    .dropbtn {
        width: 85px;
        background-color: #3498DB;
        color: white;
        padding: 12px;
        font-size: 17px;
        border: none;
        cursor: pointer;
    }

    .dropbtn:hover,
    .dropbtn:focus {
        background-color: #000;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        overflow: auto;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown a:hover {
        background-color: #000;
    }

    .show {
        display: block;
    }

    /* untuk atasan */
    .atas {
        height: 7vh;
    }

    .pertengahan {
        height: 10vh;
        background-color: #fefefe;
    }


    .tengah {
        height: 75vh;
        position: relative;
    }

    .atasan {
        color: #444;
        border-collapse: collapse;
        margin: 2px 12px auto;
        text-align: center;
        border-top: 3px solid saddlebrown;
        border-right: none;
        border-left: none;
    }

    .bawah {
        background: #ddd;
        height: 7vh;
        border-top: 4px solid darkgoldenrod;
    }

    .new a {
        padding: 12px;
        color: black;
        font-size: 13pt;
        text-decoration: none;
    }

    .new a:hover {
        background-color: #000;
        color: whitesmoke;
        height: 100%;
    }

    #ratio {
        padding: 7px;
        width: 51%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
        border-radius: 2px;
    }


    .blink {
        color: red;
        animation: blink-animation 1s steps(5, start) infinite;
        -webkit-animation: blink-animation 1s steps(5, start) infinite;
    }

    @keyframes blink-animation {
        to {
            visibility: hidden;
        }
    }

    @-webkit-keyframes blink-animation {

        to {
            visibility: hidden;
        }

    }

    .umum-atas {
        height: 10vh;
        background-color: #888;
        font-family: cursive;
    }

    .umum-tengah {
        height: 73vh;
    }

    .umum-bawah {
        font-family: monospace;
        color: white;
        border-top: 4px solid darkred;
        height: 7vh;
        background-color: #888;
        font-size: 15pt;
        text-align: center;
    }

    /* trackking */
    .information-body {
        display: grid;
        grid-template-columns: 50% 50%;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 11pt
    }

    .skill {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 20px;

        padding: 10px 11px;

    }

    .uyuy label {
        text-align: left;
    }

    .mantap {
        font-family: monospace;
        font-size: 14pt;
        width: 100%;
    }

    /* ini gambar tampil */
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    /* The Modal (background) */
    .tampil {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .berjuang {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .berjuang,
    #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .tutup {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .tutup:hover,
    .tutup:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .berjuang {
            width: 100%;
        }
    }

    /* status */
    .joko {
        text-align: center;
        position: relative;
        padding: 10px 12px;
        width: 100%;
        margin: auto;
    }

    .conten {
        border: 2px solid darkturquoise;
        width: 24%;
        height: 282px;
        text-align: center;
        margin: auto;
    }

    .kartu-atas {
        background-color: #4CAF50;
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        color: white;
        height: 25px;
        margin: auto;
        width: 100%;
    }

    .kartu-tengah {
        margin-top: 6px;
        height: 236px;
        width: 70px;
        margin: auto;
    }

    .kartu-bawah {
        margin-top: -32px;
        height: 40px;
    }

    form .form-check {
        display: inline-block;
        position: relative;
        width: 50px;
        height: 25px;
    }

    form .form-check::before {
        content: "";
        display: inline-block;
        position: relative;
        width: 50px;
        height: 25px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 30px;
        -moz-border-radius: 30px;
    }

    form .form-check:checked::after {
        left: 27px;
        background: #33aa55;
    }

    form .form-check::after {
        content: "";
        display: inline-block;
        position: absolute;
        width: 21px;
        height: 21px;
        border-radius: 25px;
        -moz-border-radius: 25px;
        background: #eee;
        left: 3px;
        top: 3px;
        transition: 0.3s;
        -moz-transition: 0.3s;
        -webkit-transition: 0.3s;
        -khtml-transition: 0.3s;
    }
</style>