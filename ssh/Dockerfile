FROM ubuntu:latest

# Aggiorna i pacchetti e installa SSH
RUN apt-get update && apt-get install -y openssh-server gnupg

# Configura SSH
RUN mkdir /var/run/sshd

# Creazione utente con password vulnerabile
RUN useradd -m ctf_doggy && echo "ctf_doggy:6jF7Til6%25Sj7rr3X%5E6PYqdJRXPPzodz22fv7xuWiv" | chpasswd

# Permetti il login con password (di default è disabilitato)
RUN sed -i 's/^#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN sed -i 's/^#PasswordAuthentication yes/PasswordAuthentication yes/' /etc/ssh/sshd_config

RUN echo "ctf{RG9ncyBhcmUgYXdlc29tZSE=}" > /home/ctf_doggy/flag.txt && chmod 600 /home/ctf_doggy/flag.txt && chown ctf_doggy:ctf_doggy /home/ctf_doggy/flag.txt

# Cripta il file flag.txt con una password
RUN echo "6jF7Til6%25Sj7rr3X%5E6PYqdJRXPPzodz22fv7xuWiv" > passphrase.txt && \
    gpg --batch --yes --passphrase-file passphrase.txt --symmetric /home/ctf_doggy/flag.txt && \
    rm passphrase.txt /home/ctf_doggy/flag.txt

EXPOSE 22

# Comando per avviare SSH
CMD ["/usr/sbin/sshd", "-D"]

