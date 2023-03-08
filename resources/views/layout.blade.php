<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="canonical" href="">
  <link rel="home" href="">

  <!-- favicon -->
  <link rel="icon" href="/assets/img/favicon-32.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32.png">

  <title>TITLE</title>

  <script language="JavaScript">
    function unScramble(eMail1, eMail2, linkText, subjectText, statusText) {
      var a, b, c, d, e;
      a = eMail1;
      c = linkText;
      b = eMail2.substring(0, eMail2.length - 5);
      if (subjectText != "") {
        d = "?subject=" + escape(subjectText);
      } else {
        d = "";
      }
      if (statusText != "") {
        e = " onMouseOver=\"top.status=\'" + statusText +
          "\'\;return true\;\" onMouseOut=\"top.status=\'\'\;return true\;\"";
      } else {
        e = "";
      }
      document.write("<A HREF=\"mai" + "lto:" + a + "@" + b + d + "\"" + e + ">" + c + "</A>");
    }
  </script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="mx-auto max-w-2xl flex justify-between mt-4 mb-8 sm:p-0 p-4">
    <ul class="">
      <li class="inline">
        <a href="/" class="mr-4 font-bold underline decoration-sky-500 hover:decoration-4">Home</a>
      </li>
    </ul>
    <ul class="">
      <li class="inline">
        <a rel="me" class="mr-2 font-bold underline decoration-sky-500 hover:decoration-4" href="https://phpc.social/@regis">Mastodon</a>
      </li>
      <li class="inline">
        <a class="mr-2 font-bold underline decoration-sky-500 hover:decoration-4" href="https://github.com/djaiss">Github</a>
      </li>
      <li class="inline">
        <a class="mr-2 font-bold underline decoration-sky-500 hover:decoration-4" href="https://dribbble.com/djaiss">Dribbble</a>
      </li>
    </ul>
  </div>

  @yield('body')

  <div class="mx-auto max-w-2xl mb-4 sm:mb-20 p-4 sm:p-0">
    <p class="text-center text-sm mb-2 text-gray-600">Hi from Canada <span class="ml-2">🇨🇦</span></p>
  </div>

</body>

</html>
