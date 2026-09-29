<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontak - LaraPress</title>
    <style>
        :root {
            --bg: #faf8f5;
            --text: #2b2b2b;
            --muted: #6b6b6b;
            --accent: #b4432c;
            --line: #ddd8d0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 18px;
            line-height: 1.7;
        }

        .wrap {
            max-width: 640px;
            margin: 0 auto;
            padding: 3rem 1.25rem;
        }

        .site-name {
            font-size: 0.95rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--muted);
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--line);
            margin-bottom: 2.5rem;
        }

        h1 {
            font-size: 2rem;
            line-height: 1.25;
            margin: 0 0 1.5rem;
        }

        dl {
            margin: 0 0 1.5rem;
        }

        dt {
            font-size: 0.85rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--muted);
            margin-top: 1rem;
        }

        dd {
            margin: 0;
        }

        a {
            color: var(--accent);
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        a:hover {
            text-decoration-thickness: 2px;
        }

        .links {
            margin-top: 3rem;
            padding-top: 1rem;
            border-top: 1px solid var(--line);
            font-size: 0.95rem;
            display: flex;
            gap: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="site-name">LaraPress</div>

        <h1>Hubungi Kami</h1>

        <dl>
            <dt>Nama</dt>
            <dd>Farah</dd>

            <dt>No Telepon</dt>
            <dd>08123456789</dd>

            <dt>Email</dt>
            <dd><a href="mailto:Farah@gmail.com">Farah@gmail.com</a></dd>

            <dt>Media Sosial</dt>
            <dd><a href="https://www.instagram.com/belvahndryn_?stkn=MXZ5cWFmam1lcHQ4eA==" target="_blank" rel="noopener">Instagram</a></dd>
        </dl>

        <div class="links">
            <a href="/">Kembali ke Halaman Utama</a>
            <a href="/tentang">Tentang</a>
        </div>
    </div>
</body>
</html>