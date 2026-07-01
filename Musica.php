<?php
declare(strict_types=1);

class Musica {

    private string $titulo;
    private string $artista;
    private string $album;
    private string $arquivo;

    public function __construct(
        string $titulo,
        string $artista,
        string $album,
        string $arquivo
    ) {
        $this->titulo = $titulo;
        $this->artista = $artista;
        $this->album = $album;
        $this->arquivo = $arquivo;
    }

    public function getTitulo(): string {
        return $this->titulo;
    }

    public function getArtista(): string {
        return $this->artista;
    }

    public function getAlbum(): string {
        return $this->album;
    }

    public function getArquivo(): string {
        return $this->arquivo;
    }
}