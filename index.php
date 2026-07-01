<?php
declare(strict_types=1);

require_once 'Musica.php';
require_once 'Playlist.php';

$minhaPlaylist = new Playlist("Playlist", "musicas");

$musica1 = new Musica(
    "Many men",
    "50 Cent",
    "Get Rich Or Die Tryin'",
    "50cent-manymen.mp3"
);

$musica2 = new Musica(
    "Superman",
    "Eminem",
    "The Eminem Show",
    "eminem-superman.mp3"
);


$minhaPlaylist->adicionar($musica1);
$minhaPlaylist->adicionar($musica2);

$musicasParaExibir = $minhaPlaylist->getMusicas();
?>

<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8">
  <title>Motor de um Player de Música</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

  <style>
    body {
      background: #121212;
      color: #eee;
      font-family: sans-serif;
    }

    .card {
      background: #181818;
      border: 1px solid #282828;
    }

    .list-group-item {
      background: #181818;
      color: #eee;
      border-color: #282828;
      cursor: pointer;
      transition: 0.3s;
    }

    .list-group-item:hover {
      background: #282828;
    }

    .playing {
      background-color: #1DB954 !important;
      color: white !important;
    }

    audio {
      filter: invert(100%) hue-rotate(80deg) brightness(1.5);
      width: 100%;
    }
  </style>
</head>

<body>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <div class="card shadow-lg">
          <div class="card-body text-center py-4">

            <h2 class="h5 text-uppercase tracking-wider opacity-75 text-light">
              <?= $minhaPlaylist->getNome() ?>
            </h2>

            <div class="my-4">
              <i class="bi bi-disc-fill display-1 text-success"></i>
            </div>

            <audio id="audioPlayer" controls>
              <source id="srcPlayer" src="" type="audio/mpeg">
            </audio>

          </div>

          <div class="list-group list-group-flush">

            <?php if (empty($musicasParaExibir)): ?>
              <div class="p-4 text-center text-muted">
                Nenhuma música adicionada à playlist.
              </div>
            <?php endif; ?>

            <?php foreach ($musicasParaExibir as $musica): ?>

              <button
                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"

                onclick="tocar(
                  '<?= $minhaPlaylist->getCaminhoPasta() . '/' . $musica->getArquivo() ?>',
                  this
                )">

                <div>
                  <i class="bi bi-play-fill me-2"></i>

                  <strong><?= $musica->getTitulo() ?></strong><br>

                  <small class="opacity-50">
                    <?= $musica->getArtista() ?>
                    •
                    <?= $musica->getAlbum() ?>
                  </small>
                </div>

              </button>

            <?php endforeach; ?>

          </div>
        </div>


      </div>
    </div>
  </div>

  <script>
    function tocar(caminhoCompleto, botao) {

      const player = document.getElementById('audioPlayer');
      const source = document.getElementById('srcPlayer');

      source.src = caminhoCompleto;

      document.querySelectorAll('.list-group-item')
        .forEach(el => el.classList.remove('playing'));

      botao.classList.add('playing');

      player.load();
      player.play();
    }
  </script>

</body>
</html>