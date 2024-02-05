<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style>
      .grid-item {
        width: 25%;
        padding: 10px;
        margin: 10px;
        color: white;
      }
      .flower {
        background: teal;
      }
      .bird {
        background: salmon;
      }
      .fruit {
        background: tomato;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="filter">
        <h1>Filtering</h1>
        <button data-name='*' class="btn btn-info active">All</button>
        <button data-name=".fruit" class="btn btn-primary">fruit</button>
        <button data-name=".flower" class="btn btn-danger">flower</button>
        <button data-name=".bird" class="btn btn-success">bird</button>
      </div>
      <div class="sort">
        <h1>sorting</h1>
        <button data-name='name' class="btn btn-primary">name</button>
        <button data-name='original-order' class="btn btn-info active">original</button>
        <button data-name='random' class="btn btn-dark">random</button>
      </div>
      <div class="grid">
        <div class="grid-item flower">Rose</div>
        <div class="grid-item bird">Parrot</div>
        <div class="grid-item fruit">Banana</div>
        <div class="grid-item flower">Tulip</div>
        <div class="grid-item bird">Sparrow</div>
        <div class="grid-item flower">Marigold</div>
        <div class="grid-item fruit">Orange</div>
        <div class="grid-item bird">gwl</div>
      </div>
    </div>

    <!-- Optional JavaScript -->

  </body>


