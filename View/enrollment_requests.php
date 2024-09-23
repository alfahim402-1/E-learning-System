<!-- views/instructor/enrollment_requests.php -->
<?php $content = 'enrollment_requests.php'; include 'views/instructor/layout.php'; ?>
<h1>Enrollment Requests</h1>
<table>
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($requests as $request): ?>
            <tr>
                <td><?= $request['student_id'] ?></td>
                <td>
                    <form method="post" action="index.php?action=acceptEnrollment">
                        <input type="hidden" name="enrollment_id" value="<?= $request['id'] ?>">
                        <input type="hidden" name="instructor_id" value="<?= $instructorId ?>">
                        <button type="submit">Accept</button>
                    </form>
                    <form method="post" action="index.php?action=rejectEnrollment">
                        <input type="hidden" name="enrollment_id" value="<?= $request['id'] ?>">
                        <input type="hidden" name="instructor_id" value="<?= $instructorId ?>">
                        <input type="text" name="reason" placeholder="Reason for rejection" required>
                        <button type="submit">Reject</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
