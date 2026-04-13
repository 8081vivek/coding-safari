<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>OTP Verification</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="margin:0; padding:0; background:#f1f5f9; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:30px 15px; background:#f1f5f9;">
<tr>
<td align="center">

<table width="100%" cellpadding="0" cellspacing="0" style="max-width:520px; background:#ffffff; border-radius:10px; padding:35px; box-shadow:0 4px 14px rgba(0,0,0,0.05);">

<!-- Logo / Title -->
<tr>
<td align="center" style="padding-bottom:15px;">
<h2 style="margin:0; color:#111827; font-weight:600;">🔐 OTP Verification</h2>
</td>
</tr>

<!-- Greeting -->
<tr>
<td style="color:#374151; font-size:15px; line-height:24px;">
Hello 👋,<br><br>
Aapke account verification ke liye ek One-Time Password generate kiya gaya hai.
Niche diya gaya OTP enter karke verification complete karein:
</td>
</tr>

<!-- OTP BOX -->
<tr>
<td align="center" style="padding:30px 0;">
<div style="
display:inline-block;
background:#eef2ff;
border-radius:8px;
padding:18px 35px;
font-size:30px;
font-weight:700;
letter-spacing:8px;
color:#1e3a8a;
border:1px solid #c7d2fe;">
{{ $otp }}
</div>
</td>
</tr>

<!-- Expiry Notice -->
<tr>
<td align="center">
<div style="
display:inline-block;
background:#fff7ed;
color:#c2410c;
font-size:13px;
padding:8px 14px;
border-radius:6px;
font-weight:500;">
⏳ OTP expires in <strong>2 minutes</strong>
</div>
</td>
</tr>

<!-- Info Text -->
<tr>
<td style="padding-top:20px; color:#6b7280; font-size:13px; line-height:20px;">
Security Tip: Kabhi bhi apna OTP kisi ke saath share na karein.  
Agar aapne ye request nahi ki hai to is email ko ignore kar dein.
</td>
</tr>

<!-- Footer -->
<tr>
<td align="center" style="padding-top:35px; font-size:12px; color:#9ca3af;">
© {{ date('Y') }} Coding Safari<br>
All rights reserved.
</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>
