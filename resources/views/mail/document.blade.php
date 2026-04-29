<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { padding: 20px; border: 1px solid #ddd; border-radius: 8px; max-width: 600px; margin: 0 auto; }
        .header { background-color: #0096c7; color: white; padding: 15px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Dokumen Baru Diterima</h2>
        </div>
        <div class="content">
            <p>Halo,</p>
            <p>Anda telah menerima dokumen PDF melalui sistem <strong>{{ config('app.name', 'DocManager') }}</strong>.</p>
            
            @if(!empty($keterangan))
            <div style="background-color: #e8f0fe; padding: 15px; border-left: 4px solid #00b4d8; margin: 15px 0;">
                <p style="margin: 0;"><strong>Pesan:</strong><br> {{ $keterangan }}</p>
            </div>
            @endif
            
            <p>Silakan periksa bagian <strong>lampiran (attachment)</strong> pada email ini untuk mengunduh dokumen PDF tersebut.</p>
        </div>
        <div class="footer">
            <p>Email ini dikirim secara otomatis. Mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>
</html>