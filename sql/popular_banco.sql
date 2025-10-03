
-- Inserir usuários
INSERT INTO usuarios
    (pk_usuario, nome_usuario, email_usuario, senha_usuario, foto_usuario, cargo, linha_maquinista, horario_maquinista)
VALUES
    ('1', 'maquinista1', 'maquinista1@gmail.com', '$2y$10$Ek/Eib0MVU7nMA2gdFLV/OmOiqYJ8ihSPjNq4nTF7AGRWeUo8Loia', 'uploads/foto_12_1758981995.png', 3, 'Linha Azul', '08:00-16:00'),
    ('2', 'maquinista2', 'maquinista2@gmail.com', '$2y$10$8uzM70ZttYLISaOrCoSpxej2li5cMjuFOTVqf88dLaCZqYo/lWYfe', 'uploads/foto_12_1758981995.png', 3, 'Linha Verde', '10:00-18:00'),
    ('3', 'maquinista3', 'maquinista3@gmail.com', '$2y$10$Po4dznrR4gD.hPxGy0boTOd97rZw0L6yTnY/OcfTI.aoV3HawT9/u', 'uploads/foto_12_1758981995.png', 3, 'Linha Vermelha', '12:00-20:00')
;

INSERT INTO linhas_trem
    (id_linha,nome_linha, id_usuario)
VALUES
    (1, 'Linha Azul', 1 ),
    (2, 'Linha Verde', 2),
    (3, 'Linha Vermelha', 3)
    ;
