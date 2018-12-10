#include <stdio.h>
#include <sys/time.h>
#include <stdlib.h>
#include <string.h>

// If you use unix like Linux/FreeBSD than you can use next commands:
//
// gcc task_1.c -o task1
// sudo chmod +x task1
// ./task1
//
int main(int argc, char **argv) {
    int n = 41;
    char tmp[n][8];
    char *str = "01110000 01110010 01101001 01101110 01110100 00100000 01101111 01110101 "
                "01110100 00100000 01111001 01101111 01110101 01110010 00100000 01101110 "
                "01100001 01101101 01100101 00100000 01110111 01101001 01110100 01101000 "
                "00100000 01101111 01101110 01100101 00100000 01101111 01100110 00100000 "
                "01110000 01101000 01110000 00100000 01101100 01101111 01101111 01110000 "
                "01110011";

    for (int i = 0; i < n; ++i) {
        memcpy(tmp[i], &str[9*i], 8);
        printf("%c", (char) strtol(tmp[i], 0, 2));
    }

    printf("\n\nAnswer:\n");

    char *answer = "<?php\n"
                   "$name = 'Max';\n"
                   "for ($i = 0; $i < strlen($name); $i++) {\n"
                   "    echo $name[$i];\n"
                   "}\n";
    printf("%s", answer);
}
