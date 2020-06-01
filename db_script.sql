CREATE TABLE `users` (
`id` int(99) NOT NULL,
`Name` varchar(300) NOT NULL,
`Email` varchar(300) NOT NULL,
`Password` varchar(450) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `users`
ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

CREATE TABLE `blog` (
`id` int(99) NOT NULL,
`title` varchar(300) NOT NULL,
`content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `blog`
ADD PRIMARY KEY (`id`);

ALTER TABLE `blog`
MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;