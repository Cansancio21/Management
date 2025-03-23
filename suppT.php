<?php
include 'db.php'; // Include database connection

// Start session to access user data
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: customerP.php"); // Redirect to login if not logged in
    exit();
}

$user = $_SESSION['user']; // Get user data from session
$c_id = htmlspecialchars($user['c_id']);
$c_lname = htmlspecialchars($user['c_lname']);
$c_fname = htmlspecialchars($user['c_fname']);

// Fetch only this user's support tickets
$query = "SELECT id, c_id, c_lname, c_fname, s_subject, s_message, s_status FROM tbl_supp_tickets WHERE c_id = '$c_id' ORDER BY id DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Tickets</title>
    <link rel="stylesheet" href="suppT.css"> 
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <h1>Support Tickets</h1>
            
            <div class="table-box">
                <h2>Customer Support Requests</h2>
                <hr>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Ticket ID</th>
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['c_id']); ?></td>
                                <td><?php echo htmlspecialchars($row['c_lname'] . ', ' . $row['c_fname']); ?></td>
                                <td><?php echo htmlspecialchars($row['s_subject']); ?></td>
                                <td><?php echo htmlspecialchars($row['s_message']); ?></td>
                                <td>
                                    <select name="status" onchange="updateStatus(this, '<?php echo $row['id']; ?>')">
                                        <option value="1" <?php echo ($row['s_status'] == 1) ? 'selected' : ''; ?>>Open</option>
                                        <option value="0" <?php echo ($row['s_status'] == 0) ? 'selected' : ''; ?>>Closed</option>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- Create Ticket Button -->
            <button onclick="openModal()">Create Ticket</button>

            <!-- Modal for Creating Ticket -->
            <div id="modalBackground" class="modal-background"></div>
            <div id="createTicketModal" class="modal-content" style="display:none;">
                <span onclick="closeModal()" class="close">&times;</span>
                <h2>Create New Ticket</h2>
                <form id="createTicketForm" onsubmit="return createTicket(event)">
                    <input type="hidden" name="c_id" value="<?php echo htmlspecialchars($c_id); ?>">
                    <input type="hidden" name="c_lname" value="<?php echo htmlspecialchars($c_lname); ?>">
                    <input type="hidden" name="c_fname" value="<?php echo htmlspecialchars($c_fname); ?>">

                    <!-- Subject Displayed -->
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" readonly>
                    <br>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                    <br>
                    <button type="submit">Submit Ticket</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateStatus(select, ticketId) {
            const status = select.value;
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "updateS.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Status updated successfully!");
                }
            };
            xhr.send("id=" + ticketId + "&status=" + status);
        }

        function openModal() {
            // Generate a unique reference number dynamically
            const date = new Date();
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            const uniqueNumber = Math.floor(100000 + Math.random() * 900000);
            const subject = `ref#-${day}-${month}-${year}-${uniqueNumber}`;

            // Set the generated subject in the input field
            document.getElementById('subject').value = subject;

            document.getElementById('createTicketModal').style.display = 'block';
            document.getElementById('modalBackground').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('createTicketModal').style.display = 'none';
            document.getElementById('modalBackground').style.display = 'none';
        }

        function createTicket(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById('createTicketForm'));

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "ticket.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    console.log(xhr.responseText);
                    if (xhr.status === 200 && xhr.responseText.trim() === "success") {
                        alert("✅ Ticket created successfully!");
                        closeModal();
                        setTimeout(() => { location.reload(); }, 500); // ✅ Reload page after success
                    } else {
                        alert("❌ Error creating ticket: " + xhr.responseText);
                    }
                }
            };
            xhr.send(formData);
        }
    </script>
</body>
</html>

<?php
mysqli_close($conn);
?>
