<?php
/**
 * CONFIGURAÇÃO DO SITE
 * Aqui mudas contactos, links e textos globais. Tudo o que está como
 * [PREENCHER: ...] é informação que ainda falta confirmar com a escola.
 */
return [
    'nome_curso'   => 'Técnico de Informática de Gestão',
    'nome_longo'   => 'Curso Profissional de Técnico de Informática de Gestão',
    'escola'       => 'Agrupamento de Escolas da Cidadela',
    'escola_sede'  => 'E.S. Cidadela',
    'ano_letivo'   => '2026/2027',
    'inicio_curso' => '2022/23',
    'slogan'       => '[PREENCHER: slogan do curso]',

    // URL final do site, sem barra no fim (usado em sitemap e SEO). Ex.: https://www.exemplo.pt
    'base_url'     => '',

    // Fonte: aecidadela.pt (confirmado)
    'morada'       => 'Rua Dr. Fernando M. F. Batista Viegas 1, 1A',
    'codigo_postal'=> '2750-503 Cascais',
    'telefone'     => '21 486 40 80',
    'telefone_href'=> '+351214864080',
    'email'        => 'secretaria@aecidadela.pt',
    'email_direcao'=> 'direcao.cidadela@aecidadela.pt',
    'site_escola'  => 'https://aecidadela.pt',
    'direcao_curso'=> 'José Pereira',
    'direcao_curso_email' => 'jose.pereira@aecidadela.pt',

    'redes' => [
        'Facebook'  => 'https://facebook.com/AgrupamentoDeEscolasDaCidadela',
        'Instagram' => 'https://instagram.com/agrupamento_escolas_cidadela',
        'YouTube'   => 'https://youtube.com/channel/UCt8nwDI0EUT8EQiwX81eKnw',
    ],

    // Pré-inscrição oficial do agrupamento
    'preinscricao_url' => 'https://docs.google.com/forms/d/e/1FAIpQLScQT38_QdyRsseGdIzrWxLXoJYaeF75qNjx_XYtXFUDTYFKsw/viewform',
    'video_url'        => 'https://youtu.be/otDMRCysM24',
    'plano_pdf'        => 'https://aecidadela.pt/wp-content/uploads/2024/04/Distribuicao-Modular-Inf-Gestao.pdf',
    'eqavet_url'       => 'https://aecidadela.pt/eqavet/',

    // Email que recebe o formulário de contactos. Vazio = guarda em storage/mensagens.jsonl
    'form_mail_to' => '',
];
