# Site do Curso Profissional de Técnico de Informática de Gestão
Agrupamento de Escolas da Cidadela, Cascais. Feito em **PHP 8 puro** (sem frameworks, sem base de dados).

## Estrutura
| Pasta / ficheiro | Para que serve |
|---|---|
| `*.php` (raiz) | Uma página por ficheiro (`index.php`, `curso.php`, `plano.php`, …) |
| `inc/config.php` | **Contactos, links, nome da escola, slogan, direção de curso** |
| `inc/layout.php` | Cabeçalho, menu e rodapé (comuns a todas as páginas) |
| `data/plano.php` | Plano de estudos (disciplinas, módulos, horas) |
| `data/projetos.php` | Projetos dos alunos (vazio até haver dados; tem exemplo) |
| `data/menu.php` | Menu principal e pesquisa |
| `assets/css/style.css` | Aspeto. Cores e fontes estão nas variáveis no topo (`:root`) |
| `assets/img/logo.svg` | Logótipo **provisório**. Substitui pelo oficial |
| `storage/` | Guarda mensagens do formulário (se não houver email configurado). Bloqueada ao público |

## Como editar
- **Contactos, slogan, ano letivo:** `inc/config.php`.
- **Tudo o que aparece com fundo amarelo `[PREENCHER: ...]`** é informação em falta. Procura por `PREENCHER` nos ficheiros para os encontrares todos.
- **Adicionar projeto:** `data/projetos.php`, copia o exemplo comentado.
- **Trocar cores:** `:root` no topo de `assets/css/style.css`.
- **Receber mensagens por email:** em `inc/config.php` preenche `form_mail_to`. Se ficar vazio, as mensagens são guardadas em `storage/mensagens.jsonl`.
- **Domínio:** em `inc/config.php` preenche `base_url` (ex.: `https://www.exemplo.pt`) para SEO e sitemap.

## Testar no teu computador
`php -S localhost:8000` na pasta do projeto, e abre http://localhost:8000

## Publicar
Alojamento com PHP 8+ e Apache (cPanel serve): envia **todos** os ficheiros por FTP/Gestor de Ficheiros para `public_html`. O `.htaccess` protege `inc/`, `data/` e `storage/`.
Em Nginx, bloqueia estas três pastas na configuração.

## Fontes oficiais dos dados
Morada, telefone, emails, redes, formulário de pré-inscrição e plano modular vêm de aecidadela.pt.
Total confirmado: **3200 h** (soma do PDF oficial).

## Por fazer
Logótipo oficial, fotografias das instalações, parcerias, vagas/critérios, prazos, projetos, testemunhos, confirmação do selo EQAVET.

## Fontes
Space Grotesk (títulos), Inter (texto) e JetBrains Mono (detalhes técnicos), alojadas em `assets/fonts/` (licença OFL).
