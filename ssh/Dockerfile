FROM ubuntu:latest

# Aggiorna i pacchetti e installa SSH
RUN apt-get update && apt-get install -y openssh-server

# Configura SSH
RUN mkdir /var/run/sshd

# Creazione utente con password vulnerabile
RUN useradd -m ctfplayer && echo "ctfplayer:6jF7Til6%Sj7rr3X^6PYqdJRXPPzodz22fv7xuWiv" | chpasswd

# Permetti il login con password (di default è disabilitato)
RUN sed -i 's/^#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN sed -i 's/^#PasswordAuthentication yes/PasswordAuthentication yes/' /etc/ssh/sshd_config

# Comando per avviare SSH
CMD ["/usr/sbin/sshd", "-D"]

