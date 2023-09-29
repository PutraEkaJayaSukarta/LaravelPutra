<!DOCTYPE html>
<html>
<head>
    <title>PDF Preview</title>
    <style>
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow: hidden;
    }
    
    iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
</style>

</head>
<body>
    <iframe src="data:application/pdf;base64,{{ base64_encode($pdfContent) }}" width="100%" height="600px"></iframe>
</body>
</html>
