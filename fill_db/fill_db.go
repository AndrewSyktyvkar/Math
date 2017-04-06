package main

import (
	"encoding/xml"
	"fmt"
	"io"
	"log"
	"os"
)

func main() {
	f, err := os.Open("tests.xml")
	if err != nil {
		log.Fatal(err)
	}

	decoder := xml.NewDecoder(f)
	for {
		t, err := decoder.Token()
		if err == io.EOF {
			break
		} else if err != nil {
			log.Fatal(err)
		}

		switch se:=t.(type) {
			case xml.StartElement:
				for k, v := range se.Attr {
					fmt.Printf("key=%v attr=%v\n", k, v)
				}
		}
	}
}
