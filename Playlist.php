<?php
declare(strict_types=1);

class Playlist {

    private string $nome;
    private string $caminhoPasta;

    /**
     * @var Musica[]
     */
    private array $musicas = [];

    public function __construct(string $nome, string $caminhoPasta)
    {
        $this->nome = $nome;
        $this->caminhoPasta = $caminhoPasta;
    }

    public function adicionar(Musica $musica): void
    {
        $this->musicas[] = $musica;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCaminhoPasta(): string
    {
        return $this->caminhoPasta;
    }

    public function getMusicas(): array
    {
        return $this->musicas;
    }
}