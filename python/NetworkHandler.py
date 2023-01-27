import socket
import OMRProject
server = socket.socket(socket.AF_INET , socket.SOCK_STREAM)
server.bind(("127.0.0.1" , 2222))
server.listen(10000)
while True:
    connection ,addr = server.accept()
    filepath = connection.recv(2048).decode("utf-8")
    result = OMRProject.parseOMR(filepath)
    connection.send(result.encode("utf-8"))
    print(result)
    print("New OMR Evaluation request from:- " + str(addr))