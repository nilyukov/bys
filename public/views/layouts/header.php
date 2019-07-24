<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <style>
        .facet-list {
            list-style-type: none;
            margin: 0;
            margin-right: 10px;
            background: #eee;
            padding: 5px;
            width: 143px;
            min-height: 1.5em;
            font-size: 0.85em;
        }
        .facet-list li {
            margin: 5px;
            padding: 5px;
            font-size: 1.2em;
            width: 120px;
        }
        .facet-list li.placeholder {
            height: 1.2em
        }
        .facet {
            border: 1px solid #bbb;
            background-color: #fafafa;
            cursor: move;
        }
        .facet.ui-sortable-helper {
            opacity: 0.5;
        }
        .placeholder {
            border: 1px solid orange;
            background-color: #fffffd;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />
</head>
<body>
