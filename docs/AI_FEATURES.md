# AI Setia

## Tujuan
Membantu pengguna menemukan jasa, merapikan brief proyek, menjelaskan kategori, dan menyarankan pertanyaan untuk penyedia.

## Kontrak fitur
- Endpoint yang disarankan: POST /ai/chat, dilindungi rate limiting dan validasi.
- Input: pesan pengguna dan ID percakapan opsional.
- Output: teks jawaban, saran kategori/layanan jika relevan, serta status provider.
- Gunakan provider server-side; API key tidak pernah dikirim ke browser.
- Terapkan batas panjang input, throttling, timeout, penanganan kegagalan provider, dan logging minimum.
- Jangan mengklaim sebagai psikolog atau memberi diagnosis. Untuk fitur teman curhat, gunakan empati umum dan arahkan ke bantuan profesional/darurat bila ada risiko keselamatan.
- Jangan mengirim kata sandi, token, data pembayaran, atau data pribadi yang tidak perlu ke provider AI.
