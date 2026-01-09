<div style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 30px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 25px; border-radius: 6px;">

        <h2 style="color: #333333; text-align: center;">
            Richiesta per diventare un revisore
        </h2>

        <p style="color: #555555; font-size: 15px;">
            Un utente ha richiesto di diventare un revisore sulla piattaforma <strong>Presto</strong>.
        </p>

        <table style="width: 100%; margin: 20px 0; font-size: 14px;">
            <tr>
                <td style="padding: 6px 0;"><strong>Nome:</strong></td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td style="padding: 6px 0;"><strong>Email:</strong></td>
                <td>{{ $user->email }}</td>
            </tr>
        </table>

        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ route('make.revisor', $user) }}"
                style="background-color: #fbbf24; color: #000000; text-decoration: none; padding: 12px 20px; border-radius: 4px; font-weight: bold;">
                Rendi revisore
            </a>
        </div>

        <p style="color: #999999; font-size: 12px; margin-top: 30px; text-align: center;">
            Questa email è stata generata automaticamente da Presto.
        </p>

    </div>
</div>
