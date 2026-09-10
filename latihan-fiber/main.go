package main

import (
	"github.com/gofiber/fiber/v3"
)

func main() {
	app := fiber.New()

	app.Get("/", func(c fiber.Ctx) error {
		return c.SendString("Hello, Fiber!")
	})

	app.Get("/api/mahasiswa", func(c fiber.Ctx) error {
		return c.JSON(fiber.Map{
			"nim":           "H1H024048",
			"nama":          "Wendy Virtus",
			"program_studi": "Teknik Komputer",
		})
	})

	app.Listen(":3000")
}