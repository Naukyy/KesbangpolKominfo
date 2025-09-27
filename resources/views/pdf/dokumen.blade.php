<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulir Perubahan Kesbangpol - {{ $dokumen->nomor_dokumen }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; line-height: 1.4; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; vertical-align: top; }
        th { background: #f2f2f2; }
        .section-title { font-weight: bold; background: #e9ecef; padding: 8px; border-left: 4px solid #007bff; }
        .no-border { border: none !important; }
        .center { text-align: center; }
        .signature-table td { height: 80px; vertical-align: bottom; }
        .badge { display: inline-block; padding: 2px 8px; border-radius: 4px; font-size: 11px; }
        .bg-success { background: #198754; color: #fff; }
        .bg-warning { background: #ffc107; color: #000; }
        .bg-danger { background: #dc3545; color: #fff; }
        .bg-secondary { background: #6c757d; color: #fff; }
        a { color: #007bff; text-decoration: underline; }
    </style>
</head>
<body>
    <table style="margin-bottom:10px;">
        <tr>
            <td class="no-border center" colspan="2">
                <h2>FORMULIR PERUBAHAN KESBANGPOL</h2>
            </td>
        </tr>
    </table>

    <!-- Informasi Rencana Perubahan -->
    <table>
        <tr>
            <th colspan="6" class="center section-title">Informasi Rencana Perubahan</th>
        </tr>
        <tr>
            <th>Nomor</th>
            <td>{{ $dokumen->nomor_dokumen }}</td>
            <th>Tanggal</th>
            <td>{{ $dokumen->tanggal_dokumen->format('d F Y') }}</td>
            <th>Judul</th>
            <td>{{ $dokumen->judul }}</td>
        </tr>
        <tr>
            <th>Lingkup Perubahan</th>
            <td colspan="2">{{ implode(', ', $dokumen->lingkup_perubahan) }}</td>
            <th>Penyusun</th>
            <td colspan="2">{!! $dokumen->penyusun !!}</td>
        </tr>
        <tr>
            <th>Target Penyelesaian</th>
            <td colspan = "2">{{ $dokumen->target_penyelesaian->format('d F Y') }}</td>
            <th>Lokasi</th>
            <td colspan="2">{{ $dokumen->lokasi }}</td>
        </tr>
    </table>

    <!-- Analisis Perubahan -->
    <table>
        <tr>
            <th colspan="6" class="center section-title">Analisis Perubahan</th>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td colspan="5">{{ $dokumen->analisisPerubahan->deskripsi ?? '-' }}</td>
        </tr>
        <tr>
            <th>Risiko</th>
            <td colspan="5">
                @if(!empty($dokumen->analisisPerubahan->risiko))
                    <ol style="margin:0;padding-left:16px;">
                        @foreach(explode("\n", $dokumen->analisisPerubahan->risiko) as $risiko)
                            <li>{{ $risiko }}</li>
                        @endforeach
                    </ol>
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>Dampak</th>
            <td colspan="2">
                @if(!empty($dokumen->analisisPerubahan->dampak))
                    <ol style="margin:0;padding-left:16px;">
                        @foreach(explode("\n", $dokumen->analisisPerubahan->dampak) as $dampak)
                            <li>{{ $dampak }}</li>
                        @endforeach
                    </ol>
                @else
                    -
                @endif
            </td>
            <th>Mitigasi</th>
            <td colspan="2">
                @if(!empty($dokumen->analisisPerubahan->mitigasi))
                    <ol style="margin:0;padding-left:16px;">
                        @foreach(explode("\n", $dokumen->analisisPerubahan->mitigasi) as $mitigasi)
                            <li>{{ $mitigasi }}</li>
                        @endforeach
                    </ol>
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>Prioritas</th>
            <td colspan="2">{{ $dokumen->analisisPerubahan->prioritas ?? '-' }}</td>
            <th>Kategori</th>
            <td colspan="2">{{ $dokumen->analisisPerubahan->kategori ?? '-' }}</td>
        </tr>
    </table>

    <!-- Rencana Pengembangan Perubahan -->
    <table>
        <tr>
            <th colspan="3" class="center section-title">Rencana Pengembangan Perubahan</th>
        </tr>
        <tr>
            <th>Tahapan</th>
            <th>Deskripsi</th>
            <th>Durasi</th>
        </tr>
        <tr>
            <td>Persiapan:</td>
            <td>
                @if(!empty($dokumen->rencanaPengembanganPerubahan->persiapan_deskripsi))
                    <ol style="margin:0;padding-left:16px;">
                        @foreach(explode("\n", $dokumen->rencanaPengembanganPerubahan->persiapan_deskripsi) as $persiapan)
                            <li>{{ $persiapan }}</li>
                        @endforeach
                    </ol>
                @else
                    -
                @endif
            </td>
            <td>{{ $dokumen->rencanaPengembanganPerubahan->persiapan_durasi ?? '-' }}</td>
        </tr>
        <tr>
            <td>Pelaksanaan:</td>
            <td>
                @if(!empty($dokumen->rencanaPengembanganPerubahan->pelaksanaan_deskripsi))
                    <ol style="margin:0;padding-left:16px;">
                        @foreach(explode("\n", $dokumen->rencanaPengembanganPerubahan->pelaksanaan_deskripsi) as $pelaksanaan)
                            <li>{{ $pelaksanaan }}</li>
                        @endforeach
                    </ol>
                @else
                    -
                @endif
            </td>
            <td>{{ $dokumen->rencanaPengembanganPerubahan->pelaksanaan_durasi ?? '-' }}</td>
        </tr>
    </table>

    <!-- Pemantauan Perubahan -->
    <table>
        <tr>
            <th colspan="5" class="center section-title">Pemantauan Perubahan</th>
        </tr>
        <tr>
            <th>Status</th>
            <th>Disetujui</th>
            <th>Ditunda</th>
            <th>Ditolak</th>
            <th>Keterangan</th>
        </tr>
        <tr>
            @php
                $pemantauan = $dokumen->pemantauanPerubahan;
                $status = $pemantauan && $pemantauan->status ? $pemantauan->status : 'Draft';
            @endphp
            <td>
                <span class="badge bg-{{ $status == 'Disetujui' ? 'success' : ($status == 'Ditunda' ? 'warning' : ($status == 'Ditolak' ? 'danger' : 'secondary')) }}">
                    {{ $status }}
                </span>
            </td>
            <td class="center">{{ $status == 'Disetujui' ? '✔' : '' }}</td>
            <td class="center">{{ $status == 'Ditunda' ? '✔' : '' }}</td>
            <td class="center">{{ $status == 'Ditolak' ? '✔' : '' }}</td>
            <td>{{ $pemantauan && $pemantauan->keterangan !== null ? $pemantauan->keterangan : '-' }}</td>
        </tr>
        <tr>
            <th colspan="5">Penugasan</th>
        </tr>
        <tr>
            <td colspan="5">
                @if($pemantauan && !empty($pemantauan->penugasan))
                    <ol style="margin:0;padding-left:16px;">
                        @foreach(preg_split('/\r\n|\r|\n/', $pemantauan->penugasan) as $petugas)
                            <li>{{ $petugas }}</li>
                        @endforeach
                    </ol>
                @else
                    -
                @endif
            </td>
        </tr>
    </table>

    <!-- Tanda Tangan -->
    <table style="margin-top:20px;">
        <tr>
            <th class="center">Diusulkan Oleh,</th>
            <th class="center">Disetujui Oleh,</th>
        </tr>
        <tr>
            <td class="center">
                <div>{{ $pemantauan && $pemantauan->diusulkan_oleh_jabatan ? $pemantauan->diusulkan_oleh_jabatan : '-' }}</div>
                <br><br>
                <div>
                    {{ $pemantauan && $pemantauan->diusulkan_oleh_nama ? $pemantauan->diusulkan_oleh_nama : '-' }}<br>
                    NIP. {{ $pemantauan && $pemantauan->diusulkan_oleh_nip ? $pemantauan->diusulkan_oleh_nip : '-' }}
                </div>
            </td>
            <td class="center">
                <div>{{ $pemantauan && $pemantauan->disetujui_oleh_jabatan ? $pemantauan->disetujui_oleh_jabatan : '-' }}</div>
                <br><br>
                <div>
                    {{ $pemantauan && $pemantauan->disetujui_oleh_nama ? $pemantauan->disetujui_oleh_nama : '-' }}<br>
                    NIP. {{ $pemantauan && $pemantauan->disetujui_oleh_nip ? $pemantauan->disetujui_oleh_nip : '-' }}
                </div>
            </td>
        </tr>
    </table>
</body>
</html>