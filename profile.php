<?php
session_start();
include "./include/connessione.inc"; // Assicurati di avere una connessione al database

// Verifica se l'utente è loggato
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

$id_user = $_SESSION['id_user'];
include "./takeData/takeUserData/takeUserInfo.php"; // Recupera le informazioni dell'utente

// Recupera i post dell'utente
//include "./gestioneUtenti/takeUserData/takeUserPosts.php";

// Recupera i commenti dell'utente con le informazioni sui post associati
include "./takeData/takeUserData/takeUserComments.php";
?>
<?php include "./include/start.inc"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Profilo Utente</title>
    <style>
        .post {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .comment {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        /* Stile per il pop-up */
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #ccc;
            padding: 20px;
            background-color: white;
            z-index: 1000;
        }

        .popup-overlay {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>

<body>
    <h1>Profilo di <?php echo htmlspecialchars($userInfoResult['email']); ?></h1>
    <a href='gestioneUtenti/logout.php'>Logout</a>
    <h2>Biografia</h2>
    <p><?php echo nl2br(htmlspecialchars($userInfoResult['bio'] ?? '')); ?></p>
    <button onclick="openPopup()">Aggiorna Biografia</button>

    <!-- Pop-up per aggiornare la biografia -->
    <div class="popup-overlay" id="popup-overlay"></div>
    <div class="popup" id="popup">
        <h3>Aggiorna Biografia</h3>
        <form method="post" action="updateBio.php">
            <textarea name="bio" rows="5" cols="50"><?php echo htmlspecialchars($userInfoResult['bio'] ?? ''); ?></textarea>
            <button type="submit">Salva</button>
            <button type="button" onclick="closePopup()">Chiudi</button>
        </form>
    </div>

    <h2>I tuoi post</h2>
    <?php
    include "./takeData/takeUserData/takeUserPosts.php";
    include "./takedata/showData/showPosts.php";
    ?>

    <h2>I tuoi commenti</h2>
    <?php while ($comment = $commentsResult->fetch_assoc()): ?>
        <div class="comment">
            <form method="post" action="gestionePost/deleteComment.php" style="display:inline;">
                <small>Post associato: </small></br>
                <div class="post">
                    <?php echo htmlspecialchars($comment['pTitle']); ?>
                    </br><?php echo htmlspecialchars($comment['description']); ?>
                </div>

                <p>commento: <?php echo htmlspecialchars($comment['text']); ?></p>
                <input type="hidden" name="id_comment" value="<?php echo $comment['id_comment']; ?>">
                <button type="submit">Cancella</button>
            </form>
        </div>
    <?php endwhile; ?>

    <script>
        function openPopup() {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('popup-overlay').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('popup-overlay').style.display = 'none';
        }
    </script>
</body>
<?php include "./include/end.inc"; ?>

</html>