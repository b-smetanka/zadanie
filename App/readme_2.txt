SELECT * FROM users
	INNER JOIN objects ON users.objects_id = objects.id;